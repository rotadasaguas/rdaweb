<?php
 	class LocaisController{
 		public function inicio(){
 			require 'view/ws.php';
 		}

 		public function listar(){
 			$locais = Local::all();
 			header('Content-Type: application/json; charset=utf-8');
			$ar = array();
			$ar["locais"] = $locais;
 			echo json_encode ($ar, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
 		}

		public function agencias(){
 			$agencias = Local::verAgencias();
 			header('Content-Type: application/json; charset=utf-8');
			$ar = array();
			$ar["agencias"] = $agencias;
 			echo json_encode ($ar, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
 		}

 		public function listarLocaisRotas(){
 			if (isset($_GET['id']) && isset($_GET['cidade'])) {
 				$idRota = $_GET['id'];
 				$cidade = $_GET['cidade'];

 				$locais = Local::listarLocaisRotas($idRota, $cidade);
 				$ar = array();

 				$ar["locais"] = $locais;
 				echo json_encode ($ar, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
 				
 			}
 		}

 		public function listarPorTag(){

 			if( isset($_GET['id']) != ""){
 				$id = $_GET['id'];
				$arrayID = explode(",", $_GET["id"]);

 				if($arrayID != ""){
					$aux = "";
					foreach($arrayID as $a){
						$l = 'l.id = lt.id_local AND lt.id_tag = ' . $a;
						$j = ' OR l.id = lt.id_local AND lt.id_tag = ' . $a;
						if($aux == ""){
							$aux = $l;
						}
						else{
							$aux = $aux . $j;
						}
					} 
					$places = Local::verLocal($aux);
					header('Content-Type: application/json; charset=utf-8');
					$ar = array();
					$ar["locais"] = $places;
 					echo json_encode ($ar, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
				}
				else{
 					echo "Bloqueado pelo Sistema";
 				}	
			}
			else{
				echo "Bloqueado pelo Sistema";
			}
 		}


 	}
?>