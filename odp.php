<?php
if($_GET) {
    include './connect.php';

    switch($_GET['action'])
    {
    case 'edit':
        $a = $_GET['name'] % 2;
        $a==0 ? $sql->exec( 'UPDATE tab SET pass = "'.$_GET['val'].'" WHERE id='.$_GET['id'] )
        : $sql->exec( 'UPDATE tab SET login = "'.$_GET['val'].'" WHERE id='.$_GET['id'] );
    break;
    case 'dup':
        $sql->exec( 'INSERT INTO tab (login, pass) SELECT t.login, t.pass FROM tab t WHERE id='.$_GET['id'] );
        $a = $sql->query( 'SELECT id, login, pass FROM tab ORDER BY id DESC LIMIT 1' ) ?: die('Nie udało się pobrać rekordów');
    break;
    case 'del':
        $sql->exec( 'DELETE FROM tab WHERE id='.$_GET['id'] );
    break;
    case 'add':
    
    break;
    }

    


    // $tabVal = explode("|", $_GET['val']);
    // $li = substr($tabVal[0], -1);

    // if($li == "d") {
    //     $sql->exec( 'INSERT INTO tab (login, pass) SELECT t.login, t.pass FROM tab t WHERE id='.substr($tabVal[0], 0, -1) );
    //     $a = $sql->query( 'SELECT id, login, pass FROM tab ORDER BY id DESC LIMIT 1' ) ?: die('Nie udało się pobrać rekordów');

    //     echo json_encode($a->fetchAll( PDO::FETCH_NUM ));
    // } elseif($li == "u") {
    //     $sql->exec( 'DELETE FROM tab WHERE id='.substr($tabVal[0], 0, -1) );
    // } else {
    //     $sql->exec( 'UPDATE tab SET login="'.$tabVal[1].'", pass = "'.$tabVal[2].'" WHERE id='.substr($tabVal[0], 0, -1));
    // }




    
    echo $json = json_encode($a->fetch( PDO::FETCH_NUM ));
    // while($r = $a->fetchAll( PDO::FETCH_NUM )) {
    //     //var_dump($r);
    //     //echo $r[0][0];

    //     for($i=0;$i<5;$i++) {
    //         $rekordy_z_bazy[] = [    $r[0][0], $r[0][0], 39 ];
    //     }

    //     //echo '<br><br><br>';

    //     //var_dump($rekordy_z_bazy);
    // }
    //$json = json_decode($json);

    //echo '<pre>'.print_r($json).'</pre>';

    // $rekordy_z_bazy = [

    //     [    'Michał', 'Sokołowski', 39 ]
    //   , [   'Mateusz', 'Bielak'    , 19 ]
    //   , [ 'Sebastian', 'Weremczuk' , 19 ]
    //   , [  'Krystyna', 'Rembiasz'  , 18 ]
    
    // ];
}
?>