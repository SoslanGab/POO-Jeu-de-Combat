<?php


class Trashtalker extends Monster
{
    public function hit(Hero $hero){
        $damage = rand(5, 20);
        
        if($hero instanceof TrashTalker){
            $damage = $damage * 2;
        }

        if ($monster->getHealthPoint() - $damage < 0) {
            $monster->setHealthPoint(0);
        }else{
            $monster->setHealthPoint($monster->getHealthPoint() - $damage);
        }
        return $damage;
    }
}