<?php

namespace App\Nova\Actions;

use App\Models\Email;
use App\Mail\LoginData;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Http\Requests\NovaRequest;

class SendLoginData extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        if( count($models) > 20 ){
            return Action::danger('Por favor no enviar más de 20 correos al mismo tiempo');
        }else{

            foreach($models as $user){

                if($user->role == 'client'){
                    try{
                        $email = Mail::to($user->email)->bcc($user->agent->email);
                        $email->send(new LoginData($user));
        
                        if ($email) {
                            // El correo electrónico se envió correctamente
    
                            //primeras 3 letras del nombre
                            $generatedPass = substr($user->name, 0, 3);
            
                            //gion bajo y primeras 2 letras del correo
                            $generatedPass .= '_'.substr($user->email, 0, 2);
            
                            //lenguage en mayusculas y año actual
                            $generatedPass .= strtoupper($user->lang).date('Y');
            
                            //simbolo en caso de que no haya pais
                            $generatedPass .= '&';
                            
                            $mail = new Email();
                            $mail->user_id = $user->id;
                            $mail->agent_id = auth()->user()->id;
                            $mail->email = $user->email;
                            $mail->password = $generatedPass;
                            $mail->save();
    
                            return Action::message('Datos de acceso enviados correctamente.');
                        } else {
                            // Ocurrió un error al enviar el correo electrónico
                            return Action::danger('Error al enviar el correo a '.$user->email);
                        }
                    }
                    catch(\Exception $e){
                        return Action::danger('Error al enviar email: '.$e->getMessage() );
                    }
                }
                else{
                    return Action::danger('El usuario '.$user->name.' no es un cliente.' );
                }
                

            }

        }
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the displayable name of the action.
     *
     * @return string
    */
    public function name()
    {
        return __('Enviar datos de acceso');
    }
}
