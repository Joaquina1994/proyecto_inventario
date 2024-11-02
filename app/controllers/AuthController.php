<?php
    class AuthController extends BaseController{

        // instancia los modelos
        public function __construct(){
            $this->authModel=$this->model('AuthModel');
           

            
        }
        
        /* Función para llamar a la vista login con blanqueo de errores*/
        public function login(){


            $data = [
                'error_login'=>'',
            ]; 
            $this->view('pages/auth/login',$data);
            
        }

        /* Función que verifica los datos del usuario y 
        redirige al panel del usuario*/
        public function loginUsuario(){
            $data = [
                'email' => $_POST['email'],
                
            ];
            $usuario = $this->authModel->buscar_por_mail($data);
            if($usuario){
                if( $_POST['password']==$usuario->pass){
                    $_SESSION['id_usuario']=$usuario->id_usuario;
                    $_SESSION['nombre']=$usuario->nombre;
                    
                    $data = [
                    ];
                    $this->view('pages/dashboard/dashboard',$data);
                    
                }else{
                    $data = [
                        'error_login' => '<div class="alert alert-danger" role="alert">
                        Usuario o contraseña incorrectos.
                      </div>',
                    ];
                    $this->view('pages/auth/login',$data);
                }        
            }else{
                $data = [
                    'error_login' => '<div class="alert alert-danger" role="alert">
                    Usuario o contraseña incorrectos.
                  </div>',
                ];
                $this->view('pages/auth/login',$data);
            }
        }

        /* Función para llamar a la vista registro con blanqueo de errores*/
        public function register(){
                $data = [
                    'error_tipo'=>'',
                    'error_megas'=>'',
                    'error_pass'=>'',
                ];
            
            $this->view('pages/auth/register',$data);
        }

        /* Función que toma los datos del formulario, hace las verificaciones y los envía al modelo*/
        public function registrarUsuario(){
         //   die('arranca la funcion registrar usuario');
            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $pass2 = $_POST['password2'];
                

               // verifica que las contraseñas ingresadas sean iguales
                if ($pass == $pass2){
                    $data= [
                        'nombre' => $nombre,
                        'apellido' =>$apellido,
                        'dni' => $dni,
                        'email' => $email,
                        'pass' => $pass,
                        'pass2' => $pass2
                    ];
                    $auth = $this->authModel->buscar_por_mail($data);
                    if (empty($auth)){
                        if($this->authModel->crear_usuario($data)){
                            $data = [
                                'error_login'=>'',
                            ];
                            $this->view('pages/auth/login',$data);
                        }else{
                            die("NO SE PUDO CREAR EL USUARIO");
                        }
                    }else{
                        die("Ya existe una cuenta creada con ese email");
                    }
                    
                }else{
                    $data = [
                        'error_pass' => '<div class="alert alert-danger" role="alert">
                                             Las contraseñas no coinciden
                                        </div>',
                        'error_tipo' =>'',
                        'error_megas'=>'',
                    ];
                    $this->view('pages/auth/register',$data);
                }
        
        }
    }
        public function resetPassword(){
            
            $data = [
                'mail' => '',
                'error_mail' => '',
            ];      
            $this->view('pages/auth/forgot-password',$data);
        }

        public function enviar_password()
    {
        $email = $_POST['email'];
        $data = [
            'email' => $email,
        ];
        
        
        if (!empty($this->authModel->buscar_por_mail($data))) {
            $where = "new_pass";
            include(RUTA_APP . "/mails/mail_pass.php");
            
          
            
        } else {
            $data = [
                "error_mail"=> "<div class='alert alert-danger' role='alert'>
                            <p class = 'text-center'>No es un email válido.</p>
                         </div>",
                "mail"=>'',
            ];
            $this->view('pages/auth/forgot-password', $data);
        }
    }

    public function update_pass(){
        $data = [
            'mail' => '',
            'error_mail'=>'',
            'error_pass'=>'',
        ];
        $this->view('pages/auth/updated-password',$data);
    }

    public function actualizar_password(){
        $email = $_POST['email'];
        $passActual =$_POST['pass_actual'];
        $passNueva = $_POST['pass_nueva'];
        $passNueva2 = $_POST['pass_nueva2'];
        if ($passNueva != $passNueva2){
            $data = [
                'mail' => '',
                'error_mail'=>'',
                'error_pass'=> "<div class='alert alert-danger' role='alert'>
                <p class = 'text-center'>Las contraseñas no coinciden.</p>
             </div>",
            ];
            $this->view('pages/auth/updated-password',$data);
        }else{
            if($this->authModel->change_pass($passNueva, $email)){
                $data = [
                    'mail' => '',
                    'error_mail'=>'',
                    'error_pass'=> "<div class='alert alert-success' role='alert'>
                    <p class = 'text-center'>La contraseña fue actualizada</p>
                 </div>",
                ];
                $this->view('pages/auth/updated-password',$data);
            }
        }

    }

        /* Método para cerrar la sesión */

        public function logout()
        {
            session_unset();
            session_destroy();
            
            $this->view('pages/index');
        }
    
   
   }
   
?>