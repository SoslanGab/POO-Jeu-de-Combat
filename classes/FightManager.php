<?php


class FightManager
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findm(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM monster WHERE id = :id");
        $req->bindValue(':id', $id);
        $req->execute();
        $monsterArray = $req->fetch(PDO::FETCH_ASSOC);        
        return new Monster($monsterArray);
    }

    public function createMonster():Monster
    {
        $monster = new Monster(['name' => 'Mcgregor']);

        return $monster;
    }


    public function fight(Hero $hero, Monster $monster){
        $history = [];
        while ($hero->getHealthPoint() > 0 && $monster->getHealthPoint() > 0) {
            $damage = $monster->hit($hero);
            $history[] =  $monster->getName().' a frappé le '. $hero->getName() .' et lui a enlevé ' . $damage . ' points de vie';

            $damage = $hero->hit($monster);
            $history[] = $hero->getName() .' a frappé le '. $monster->getName() .' et lui a enlevé ' . $damage . ' points de vie';

        }
        return $history;
    }

}