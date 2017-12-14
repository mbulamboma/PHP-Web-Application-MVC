<?php
/**
 * @author           Pierre-Henry Soria <phy@hizup.uk>
 * @copyright        (c) 2015-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license          Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @link             http://hizup.uk
 */

namespace Framework;

class Rooter
{
   
    public static function run (array $aParams)
    {
        $Errors = 'Application\\Frontend\\Errors\\ErrorsController';
        $Theapp = ucfirst($aParams['app']);
        $sModule = ucfirst($aParams['module']);
        $sNamespace = 'Application\\'.$Theapp.'\\'.$sModule.'\\';
        $sModulePath = ROOT_PATH . 'Application/'.$Theapp.'/'.$sModule.'/';
        
        if (is_file($sModulePath . $sModule . 'Controller.php'))
        {
            $sModNamespace = $sNamespace . $sModule.'Controller';
            $oModule = new $sModNamespace;

            if ((new \ReflectionClass($oModule))->hasMethod($aParams['act']) && (new \ReflectionMethod($oModule, $aParams['act']))->isPublic()){
                call_user_func(array($oModule, $aParams['act']));
            }
            else{
                call_user_func(array($oModule, 'notFound'));
            }
        }
        else{
            call_user_func(array(new $Errors, 'notSeen'));
        }
    }
}
