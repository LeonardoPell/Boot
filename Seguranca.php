<?php 

    class Seguranca{

        private static $result;

        private static function retornaValidoLogin(){ #criando validação se existe um usuario logado
            $r = self::$result = isset($_SESSION['login']) && $_SESSION['login'] == true ? true : false;
            return $r; #retornando se usuario esta logado (true) ou não (false)
        }

        public static function validaLogin($true,$false){ #redirecionando conforme resultado do login
            if(self::retornaValidoLogin()){
                header('Location: '.$true);
            }else{
                header('Location: '.$false);
            }
        }


    }