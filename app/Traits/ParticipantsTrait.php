<?php
namespace App\Traits;

trait ParticipantsTrait
{
    public function attach($id, array $attributes, $touch=true)
    {
        /*try {
            if($attributes)
            {
                throw new Exception("parameter missing to form a participant", 1);
            }

        } catch (Exception $e) {

        }*/

        parent::attach($id, $attributes, $touch);

    }
}
