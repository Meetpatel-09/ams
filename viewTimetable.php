
<?php 

	function abbreviate($string){
		$abbreviation = "";
		$string = ucwords($string);
		$words = explode(" ", "$string");
		  foreach($words as $word){
			  $abbreviation .= $word[0];
		  }
	   return $abbreviation; 
	}

	$param_branch1 = $_SESSION['branch'];
	$param_semester1 = $_SESSION['semester'];
	$param_division1 = $_SESSION['division'];

	$month11 = null;
	$month12 = null;
	$month13 = null;
	$monpr11b1 = null;
	$monpr11b2 = null;
	$monpr11b3 = null;
	$monpr11b4 = null;
	$monpr12b1 = null;
	$monpr12b2 = null;
	$monpr12b3 = null;
	$monpr12b4 = null;

	$month21 = null;
	$month22 = null;
	$monpr2b1 = null; 
	$monpr2b2 = null;
	$monpr2b3 = null;
	$monpr2b4 = null;

	$month31 = null;
	$month32 = null;
	$monpr3b1 = null;
	$monpr3b2 = null;
	$monpr3b3 = null;
	$monpr3b4 = null;

	$tue1th1 = null;
	$tue1th2 = null;
	$tue1th3 = null;
	$tue1pr1b1 = null;
	$tue1pr1b2 = null;
	$tue1pr1b3 = null;
	$tue1pr1b4 = null;
	$tue1pr2b1 = null;
	$tue1pr2b2 = null;
	$tue1pr2b3 = null;
	$tue1pr2b4 = null;

	$tue2th1 = null;
	$tue2th2 = null;
	$tue2prb1 = null;
	$tue2prb2 = null;
	$tue2prb3 = null;
	$tue2prb4 = null;

	$tue3th1 = null;
	$tue3th2 = null;
	$tue3prb1 = null;
	$tue3prb2 = null;
	$tue3prb3 = null;
	$tue3prb4 = null;
	
	$wed1th1 = null;
	$wed1th2 = null;
	$wed1th3 = null;
	$wed1pr1b1 = null;
	$wed1pr1b2 = null;
	$wed1pr1b3 = null;
	$wed1pr1b4 = null;
	$wed1pr2b1 = null;
	$wed1pr2b2 = null;
	$wed1pr2b3 = null;
	$wed1pr2b4 = null;

	$wed2th1 = null;
	$wed2th2 = null;
	$wed2prb1 = null;
	$wed2prb2 = null;
	$wed2prb3 = null;
	$wed2prb4 = null;

	$wed3th1 = null;
	$wed3th2 = null;
	$wed3prb1 = null;
	$wed3prb2 = null;
	$wed3prb3 = null;
	$wed3prb4 = null;

	$thu1th1 = null;
	$thu1th2 = null;
	$thu1th3 = null;
	$thu1pr1b1 = null;
	$thu1pr1b2 = null;
	$thu1pr1b3 = null;
	$thu1pr1b4 = null;
	$thu1pr2b1 = null;
	$thu1pr2b2 = null;
	$thu1pr2b3 = null;
	$thu1pr2b4 = null;

	$thu2th1 = null;
	$thu2th2 = null;
	$thu2prb1 = null;
	$thu2prb2 = null;
	$thu2prb3 = null;
	$thu2prb4 = null;

	$thu3th1 = null;
	$thu3th2 = null;
	$thu3prb1 = null;
	$thu3prb2 = null;
	$thu3prb3 = null;
	$thu3prb4 = null;

	$fri1th1 = null;
	$fri1th2 = null;
	$fri1th3 = null;
	$fri1pr1b1 = null;
	$fri1pr1b2 = null;
	$fri1pr1b3 = null;
	$fri1pr1b4 = null;
	$fri1pr2b1 = null;
	$fri1pr2b2 = null;
	$fri1pr2b3 = null;
	$fri1pr2b4 = null;

	$fri2th1 = null;
	$fri2th2 = null;
	$fri2prb1 = null;
	$fri2prb2 = null;
	$fri2prb3 = null;
	$fri2prb4 = null;

	$fri3th1 = null;
	$fri3th2 = null;
	$fri3prb1 = null;
	$fri3prb2 = null;
	$fri3prb3 = null;
	$fri3prb4 = null;

	$sat1th1 = null;
	$sat1th2 = null;
	$sat1th3 = null;
	$sat1pr1b1 = null;
	$sat1pr1b2 = null;
	$sat1pr1b3 = null;
	$sat1pr1b4 = null;
	$sat1pr2b1 = null;
	$sat1pr2b2 = null;
	$sat1pr2b3 = null;
	$sat1pr2b4 = null;

	$sat2th1 = null;
	$sat2th2 = null;
	$sat2prb1 = null;
	$sat2prb2 = null;
	$sat2prb3 = null;
	$sat2prb4 = null;
	
	$sat3th1 = null;
	$sat3th2 = null;
	$sat3prb1 = null;
	$sat3prb2 = null;
	$sat3prb3 = null;
	$sat3prb4 = null;

	$sql = mysqli_query($conn, "SELECT * FROM timetable WHERE branch = '$param_branch1' AND semester = '$param_semester1' AND division = '$param_division1'");
	
	while($row = mysqli_fetch_array($sql)) {
		if($row['day'] == "Monday") {
			if($row['slot_number'] == "1"  || $row['no_in_slot'] == null) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$month11 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$month12 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 3 ) {
						$month13 = abbreviate($row['subject']);
					}
				} else {
					if($row['no_in_slot'] == 1 ) {
						if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$monpr11b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$monpr11b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$monpr11b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$monpr11b4 = abbreviate($row['subject']);
							}
						}
					}
					if($row['no_in_slot'] == 2 || $row['no_in_slot'] == 3) {	
						if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$monpr12b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$monpr12b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$monpr12b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$monpr12b4 = abbreviate($row['subject']);
							}
						}
					}
				}	
			} // slot 
			if($row['slot_number'] == "2" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$month21 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$month22 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 3) {
							if ($row['batch'] == 1) {
								$monpr2b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$monpr2b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$monpr2b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$monpr2b4 = abbreviate($row['subject']);
							}
						// }
				}
			}// Slot
			if($row['slot_number'] == "3" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$month31 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$month32 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$monpr3b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$monpr3b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$monpr3b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$monpr3b4 = abbreviate($row['subject']);
							}
						// }
					}
			}// Slot
		} // Day
		if($row['day'] == "Tuesday") {
			if($row['slot_number'] == "1"  || $row['no_in_slot'] == null) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$tue1th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$tue1th2 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 3 ) {
						$tue1th3 = abbreviate($row['subject']);
					}
				} else {
					if($row['no_in_slot'] == 1 ) {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$tue1pr1b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$tue1pr1b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$tue1pr1b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$tue1pr1b4 = abbreviate($row['subject']);
							}
						// }
					}
					if($row['no_in_slot'] == 2 || $row['no_in_slot'] == 3) {	
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$tue1pr2b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$tue1pr2b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$tue1pr2b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$tue1pr2b4 = abbreviate($row['subject']);
							}
						}
					// }
				}	
			} // slot 
			if($row['slot_number'] == "2" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$tue2th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$tue2th2 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$tue2prb1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$tue2prb2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$tue2prb3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$tue2prb4 = abbreviate($row['subject']);
							}
				//		}
					}
			}// Slot
			if($row['slot_number'] == "3" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$tue3th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$tue3th2 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$tue3prb1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$tue3prb2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$tue3prb3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$tue3prb4 = abbreviate($row['subject']);
							}
						// }
				}
			}// Slot
		} // Day
		if($row['day'] == "Wednesday") {
			if($row['slot_number'] == "1"  || $row['no_in_slot'] == null) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$wed1th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$wed1th2 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 3 ) {
						$wed1th3 = abbreviate($row['subject']);
					}
				} else {
					if($row['no_in_slot'] == 1 ) {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$wed1pr1b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$wed1pr1b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$wed1pr1b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$wed1pr1b4 = abbreviate($row['subject']);
							}
						// }
					}
					if($row['no_in_slot'] == 2 || $row['no_in_slot'] == 3) {	
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$wed1pr2b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$wed1pr2b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$wed1pr2b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$wed1pr2b4 = abbreviate($row['subject']);
							}
						// }
					}
				}	
			} // slot 
			if($row['slot_number'] == "2" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$wed2th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$wed2th2 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$wed2prb1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$wed2prb2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$wed2prb3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$wed2prb4 = abbreviate($row['subject']);
							}
						// }
				}
			}// Slot
			if($row['slot_number'] == "3" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$wed3th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$wed3th2 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$wed3prb1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$wed3prb2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$wed3prb3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$wed3prb4 = abbreviate($row['subject']);
							}
						// }
				}
			}// Slot
		} // Day
		if($row['day'] == "Thrusday") {
			if($row['slot_number'] == "1"  || $row['no_in_slot'] == null) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$thu1th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$thu1th2 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 3 ) {
						$thu1th3 = abbreviate($row['subject']);
					}
				} else {
					if($row['no_in_slot'] == 1 ) {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$thu1pr1b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$thu1pr1b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$thu1pr1b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$thu1pr1b4 = abbreviate($row['subject']);
							}
						// }
					}
					if($row['no_in_slot'] == 2 || $row['no_in_slot'] == 3) {	
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$thu1pr2b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$thu1pr2b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$thu1pr2b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$thu1pr2b4 = abbreviate($row['subject']);
							}
						// }
					}
				}	
			} // slot 
			if($row['slot_number'] == "2" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$thu2th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$thu2th2 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$thu2prb1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$thu2prb2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$thu2prb3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$thu2prb4 = abbreviate($row['subject']);
							}
						// }
				}
			}// Slot
			if($row['slot_number'] == "3" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$thu3th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$thu3th2 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$thu3prb1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$thu3prb2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$thu3prb3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$thu3prb4 = abbreviate($row['subject']);
							}
						// }
				}
			}// Slot
		} // Day
		if($row['day'] == "Friday") {
			if($row['slot_number'] == "1"  || $row['no_in_slot'] == null) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$fri1th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$fri1th2 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 3 ) {
						$fri1th3 = abbreviate($row['subject']);
					}
				} else {
					if($row['no_in_slot'] == 1 ) {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$fri1pr1b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$fri1pr1b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$fri1pr1b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$fri1pr1b4 = abbreviate($row['subject']);
							}
						// }
					}
					if($row['no_in_slot'] == 2 || $row['no_in_slot'] == 3) {	
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$fri1pr2b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$fri1pr2b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$fri1pr2b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$fri1pr2b4 = abbreviate($row['subject']);
							}
						// }
					}
				}	
			} // slot 
			if($row['slot_number'] == "2" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$fri2th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$fri2th2 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$fri2prb1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$fri2prb2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$fri2prb3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$fri2prb4 = abbreviate($row['subject']);
							}
						// }
				}
			}// Slot
			if($row['slot_number'] == "3" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$fri3th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$fri3th2 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$fri3prb1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$fri3prb2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$fri3prb3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$fri3prb4 = abbreviate($row['subject']);
							}
						// }
				}
			}// Slot
		} // Day
		if($row['day'] == "Saturday") {
			if($row['slot_number'] == "1"  || $row['no_in_slot'] == null) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$sat1th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$sat1th2 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 3 ) {
						$sat1th3 = abbreviate($row['subject']);
					}
				} else {
					if($row['no_in_slot'] == 1 ) {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$sat1pr1b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$sat1pr1b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$sat1pr1b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$sat1pr1b4 = abbreviate($row['subject']);
							}
						// }
					}
					if($row['no_in_slot'] == 2 || $row['no_in_slot'] == 3) {	
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$sat1pr2b1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$sat1pr2b2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$sat1pr2b3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$sat1pr2b4 = abbreviate($row['subject']);
							}
						// }
					}
				}	
			} // slot 
			if($row['slot_number'] == "2" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$sat2th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$sat2th2 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$sat2prb1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$sat2prb2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$sat2prb3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$sat2prb4 = abbreviate($row['subject']);
							}
						// }
				}
			}// Slot
			if($row['slot_number'] == "3" ) {
				if ( $row['slot_type'] == "Th") {
					if($row['no_in_slot'] == 1 ) {
						$sat3th1 = abbreviate($row['subject']);
					}
					if($row['no_in_slot'] == 2 ) {
						$sat3th2 = abbreviate($row['subject']);
					}
				} else {
						// if ($row['no_of_batch'] == 4) {
							if ($row['batch'] == 1) {
								$sat3prb1 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 2) {
								$sat3prb2 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 3) {
								$sat3prb3 = abbreviate($row['subject']);
							}
							if ($row['batch'] == 4) {
								$sat3prb4 = abbreviate($row['subject']);
							}
						// }
				}
			}// Slot
		} // Day
	}
?>
        <div style="padding: 15px;">
            <table class="style1" border="2px" bordercolor="#000000">
                <tr>
                    <td class="style2">
                        Sr. No</td>
                    <td class="style3">
                        Time</td>
                    <td class="style3">
                        Monday</td>
                    <td class="style3">
                        Tuesday</td>
                    <td class="style3">
                        Wednesday</td>
                    <td class="style3">
                        Thrusday</td>
                    <td class="style3">
                        Friday</td>
                    <td class="style3">
                        Saturday</td>
                </tr>
                <tr>
                    <td class="style2">
                        1
					</td>
                    <td class="style3">
                        10:00 to 11:00
					</td>
					<?php 
						if($month11 != null) {
							?>
							<td class="style3"> 
							<?php echo $month11; ?>
							</td>
					<?php
						} 
						else if($monpr11b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $monpr11b1 . "<br />"; 
								echo $monpr11b2 . "<br />"; 
								echo $monpr11b3 . "<br />"; 
								echo $monpr11b4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="3"> </td>';
						}
					?>
					<?php 
						if($tue1th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $tue1th1; ?>
							</td>
					<?php
						} 
						else if($tue1pr1b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $tue1pr1b1 . "<br />"; 
								echo $tue1pr1b2 . "<br />"; 
								echo $tue1pr1b3 . "<br />"; 
								echo $tue1pr1b4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="3"> </td>';
						}
					?>
					<?php 
						if($wed1th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $wed1th1; ?>
							</td>
					<?php
						} 
						else if($wed1pr1b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $wed1pr1b1 . "<br />"; 
								echo $wed1pr1b2 . "<br />"; 
								echo $wed1pr1b3 . "<br />"; 
								echo $wed1pr1b4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="3"> </td>';
						}
					?>
					<?php 
						if($thu1th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $thu1th1; ?>
							</td>
					<?php
						} 
						else if($thu1pr1b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $thu1pr1b1 . "<br />"; 
								echo $thu1pr1b2 . "<br />"; 
								echo $thu1pr1b3 . "<br />"; 
								echo $thu1pr1b4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="3"> </td>';
						}
					?>
					<?php 
						if($fri1th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $fri1th1; ?>
							</td>
					<?php
						} 
						else if($fri1pr1b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $fri1pr1b1 . "<br />"; 
								echo $fri1pr1b2 . "<br />"; 
								echo $fri1pr1b3 . "<br />"; 
								echo $fri1pr1b4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="3"> </td>';
						}
					?>
					<?php 
						if($sat1th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $sat1th1; ?>
							</td>
					<?php
						} 
						else if($sat1pr1b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $sat1pr1b1 . "<br />"; 
								echo $sat1pr1b2 . "<br />"; 
								echo $sat1pr1b3 . "<br />"; 
								echo $sat1pr1b4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="3"> </td>';
						}
					?>
                </tr>
                <tr>
                    <td class="style2">
                        2
					</td>
                    <td class="style3">
                        11:00 to 12:00
					</td>
					<?php 
						if($month12 != null) {
							?>
							<td class="style3"> 
							<?php echo $month12; ?>
							</td>
					<?php
						} 
						if($monpr12b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $monpr12b1 . "<br />"; 
								echo $monpr12b2 . "<br />"; 
								echo $monpr12b3 . "<br />"; 
								echo $monpr12b4 . "<br />"; 
							?>
							</td>
					<?php
						}
					?>
					<?php 
						if($tue1th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $tue1th2; ?>
							</td>
					<?php
						} 
						if($tue1pr2b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $tue1pr2b1 . "<br />"; 
								echo $tue1pr2b2 . "<br />"; 
								echo $tue1pr2b3 . "<br />"; 
								echo $tue1pr2b4 . "<br />"; 
							?>
							</td>
					<?php
						}
					?>
					<?php 
						if($wed1th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $wed1th2; ?>
							</td>
					<?php
						} 
						if($wed1pr2b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $wed1pr2b1 . "<br />"; 
								echo $wed1pr2b2 . "<br />"; 
								echo $wed1pr2b3 . "<br />"; 
								echo $wed1pr2b4 . "<br />"; 
							?>
							</td>
					<?php
						}
					?>
					<?php 
						if($thu1th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $thu1th2; ?>
							</td>
					<?php
						} 
						if($thu1pr2b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $thu1pr2b1 . "<br />"; 
								echo $thu1pr2b2 . "<br />"; 
								echo $thu1pr2b3 . "<br />"; 
								echo $thu1pr2b4 . "<br />"; 
							?>
							</td>
					<?php
						}
					?>
					<?php 
						if($fri1th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $fri1th2; ?>
							</td>
					<?php
						} 
						if($fri1pr2b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $fri1pr2b1 . "<br />"; 
								echo $fri1pr2b2 . "<br />"; 
								echo $fri1pr2b3 . "<br />"; 
								echo $fri1pr2b4 . "<br />"; 
							?>
							</td>
					<?php
						}
					?>
					<?php 
						if($sat1th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $sat1th2; ?>
							</td>
					<?php
						} 
						if($sat1pr2b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $sat1pr2b1 . "<br />"; 
								echo $sat1pr2b2 . "<br />"; 
								echo $sat1pr2b3 . "<br />"; 
								echo $sat1pr2b4 . "<br />"; 
							?>
							</td>
					<?php
						}
					?>
                </tr>
                <tr>
                    <td class="style2">
                        3
					</td>
                    <td class="style3">
                        12:00 to 01:00
					</td>
					<?php 
						if($month13 != null) {
							?>
							<td class="style3"> 
							<?php echo $month13; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($tue1th3 != null) {
							?>
							<td class="style3"> 
							<?php echo $tue1th3; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($wed1th3 != null) {
							?>
							<td class="style3"> 
							<?php echo $wed1th3; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($thu1th3 != null) {
							?>
							<td class="style3"> 
							<?php echo $thu1th3; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($fri1th3 != null) {
							?>
							<td class="style3"> 
							<?php echo $fri1th3; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($sat1th3 != null) {
							?>
							<td class="style3"> 
							<?php echo $sat1th3; ?>
							</td>
					<?php
						}
					?>
                </tr>
                <tr>
                    <td class="style4" colspan="8">
                        Recess</td>
                </tr>
                <tr>
                    <td class="style2">
                        4
					</td>
                    <td class="style3">
                        01:30 to 02:30
					</td>
					<?php 
						if($month21 != null) {
							?>
							<td class="style3"> 
							<?php echo $month21; ?>
							</td>
					<?php
						} 
						else if($monpr2b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $monpr2b1 . "<br />"; 
								echo $monpr2b2 . "<br />"; 
								echo $monpr2b3 . "<br />"; 
								echo $monpr2b4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
					<?php 
						if($tue2th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $tue2th1; ?>
							</td>
					<?php
						} 
						else if($tue2prb1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $tue2prb1 . "<br />"; 
								echo $tue2prb2 . "<br />"; 
								echo $tue2prb3 . "<br />"; 
								echo $tue2prb4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
					<?php 
						if($wed2th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $wed2th1; ?>
							</td>
					<?php
						} 
						else if($wed2prb1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $wed2prb1 . "<br />"; 
								echo $wed2prb2 . "<br />"; 
								echo $wed2prb3 . "<br />"; 
								echo $wed2prb4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
					<?php 
						if($thu2th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $thu2th1; ?>
							</td>
					<?php
						} 
						else if($thu2prb1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $thu2prb1 . "<br />"; 
								echo $thu2prb2 . "<br />"; 
								echo $thu2prb3 . "<br />"; 
								echo $thu2prb4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
					<?php 
						if($fri2th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $fri2th1; ?>
							</td>
					<?php
						} 
						else if($fri2prb1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $fri2prb1 . "<br />"; 
								echo $fri2prb2 . "<br />"; 
								echo $fri2prb3 . "<br />"; 
								echo $fri2prb4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
					<?php 
						if($sat2th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $sat2th1; ?>
							</td>
					<?php
						} 
						else if($sat2prb1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $sat2prb1 . "<br />"; 
								echo $sat2prb2 . "<br />"; 
								echo $sat2prb3 . "<br />"; 
								echo $sat2prb4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
                </tr>
                <tr>
                    <td class="style2">
                        5
					</td>
                    <td class="style3">
                        02:30 to 03:30
					</td>
					<?php 
						if($month22 != null) {
							?>
							<td class="style3"> 
							<?php echo $month22; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($tue2th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $tue2th2; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($wed2th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $wed2th2; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($thu2th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $thu2th2; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($fri2th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $fri2th2; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($sat2th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $sat2th2; ?>
							</td>
					<?php
						}
					?>
                </tr>
                <tr>
                    <td colspan="8" style="text-align: center">
                        Recess</td>
                </tr>
                <tr>
                    <td class="style2">
                        6
					</td>
                    <td class="style3">
                        03:40 to 04:40
					</td>
					<?php 
						if($month31 != null) {
							?>
							<td class="style3"> 
							<?php echo $month31; ?>
							</td>
					<?php
						} 
						else if($monpr3b1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $monpr3b1 . "<br />"; 
								echo $monpr3b2 . "<br />"; 
								echo $monpr3b3 . "<br />"; 
								echo $monpr3b4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
					<?php 
						if($tue3th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $tue3th1; ?>
							</td>
					<?php
						} 
						else if($tue3prb1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $tue3prb1 . "<br />"; 
								echo $tue3prb2 . "<br />"; 
								echo $tue3prb3 . "<br />"; 
								echo $tue3prb4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
					<?php 
						if($wed3th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $wed3th1; ?>
							</td>
					<?php
						} 
						else if($wed3prb1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $wed3prb1 . "<br />"; 
								echo $wed3prb2 . "<br />"; 
								echo $wed3prb3 . "<br />"; 
								echo $wed3prb4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
					<?php 
						if($thu3th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $thu3th1; ?>
							</td>
					<?php
						} 
						else if($thu3prb1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $thu3prb1 . "<br />"; 
								echo $thu3prb2 . "<br />"; 
								echo $thu3prb3 . "<br />"; 
								echo $thu3prb4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
					<?php 
						if($fri3th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $fri3th1; ?>
							</td>
					<?php
						} 
						else if($fri3prb1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $fri3prb1 . "<br />"; 
								echo $fri3prb2 . "<br />"; 
								echo $fri3prb3 . "<br />"; 
								echo $fri3prb4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
							echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
					<?php 
						if($sat3th1 != null) {
							?>
							<td class="style3"> 
							<?php echo $sat3th1; ?>
							</td>
					<?php
						} 
						else if($sat3prb1 != null) {
							?>
							<td class="style3" rowspan="2"> 
							<?php
								echo $sat3prb1 . "<br />"; 
								echo $sat3prb2 . "<br />"; 
								echo $sat3prb3 . "<br />"; 
								echo $sat3prb4 . "<br />"; 
							?>
							</td>
					<?php
						} else {
						 echo '<td class="style3" rowspan="2"> </td>';
						}
					?>
                </tr>
                <tr>
                    <td class="style2">
                        7
					</td>
                    <td class="style3">
                        04:40 to 05:40
					</td>
                    <?php 
						if($month32 != null) {
							?>
							<td class="style3"> 
							<?php echo $month32; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($tue3th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $tue3th2; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($wed3th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $wed3th2; ?>
							</td>
					<?php
						} 
					?>
					<?php 
						if($thu3th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $thu3th2; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($fri3th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $fri3th2; ?>
							</td>
					<?php
						}
					?>
					<?php 
						if($sat3th2 != null) {
							?>
							<td class="style3"> 
							<?php echo $sat3th2; ?>
							</td>
					<?php
						}
					?>
                </tr>
            </table>
        </div>
    </form>
    <div style="margin-top:15px;"></div> 