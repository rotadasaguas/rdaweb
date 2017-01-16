<?php
    class Rel{
        public $ID_LOCAL;
        public $ID_TAG;


        function save(){
                $dbh = new Conexao(); 
                $sql = 'INSERT INTO local_tag (ID_LOCAL, ID_TAG) VALUES( :id_local, :id_tag)';
                $sth = $dbh->prepare( $sql ); 
                $sth->bindParam(':id_local', $this->ID_LOCAL);
                $sth->bindParam(':id_tag', $this->ID_TAG);
                return $sth->execute(); 
        }  
    }
?>