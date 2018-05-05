<?php
$user = $entityManager->find('User', $_SESSION['user']);
if($user->getGroupId()==4){
    echo '
        <b>Typ zdarzenia:</b> 
        <select id="event_type" onChange="getEvent()" class="form-control">
    ';
    if(empty($_GET['event'])){
        $query = $entityManager->createQuery("SELECT DISTINCT e.event_name FROM Events e ORDER BY e.event_name");
        $results = $query->getResult();
        echo '
            <option value=""></option>
        ';
        foreach ($results as $event){
            echo '
                <option value="'.$event['event_name'].'">'.$event['event_name'].'</option>
            ';
        }
    }else{
        $query = $entityManager->createQuery("SELECT DISTINCT e.event_name FROM Events e WHERE e.event_name NOT LIKE '".$_GET['event']."' ORDER BY e.event_name");
        $results = $query->getResult();
        echo '
            <option value="'.$_GET['event'].'">'.$_GET['event'].'</option>
        ';
        foreach($results as $event){
            echo '
                <option value="'.$event['event_name'].'">'.$event['event_name'].'</option>
            ';
        }
    }
    echo '
        </select>
        </br>
    ';
    if(!empty($_GET['event'])){
        $events = $entityManager->getRepository('Events')
            ->createQueryBuilder('e')
            ->where('e.event_name = :event')
            ->setParameter('event', $_GET['event'])
            ->orderBy('e.event_date', 'DESC')
            ->getQuery()
            ->getResult();
        echo '
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="5%">lp.</th>
                    <th width="20%">Zmienione przez</th>
                    <th width="60%">Opis</th>
                    <th width="15%">Data</th>
                  </tr>
                </thead>
                <tbody>
        ';
        $l = 1;
        foreach($events as $event){
            echo '
                <tr>
                    <td>'.$l. '</td>
                    <td>'.$event->getChanger().'</td>
                    <td>'.$event->getDescription().'</td>
                    <td>'.$event->getEventDate().'</td>
                </tr>
            ';
            $l++;
        }
        echo '</tbody></table>';
    }
}