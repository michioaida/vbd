<?php
App::uses('AppController', 'Controller');
App::uses('ConnectionManager', 'Model');


/**
 * Import Controller
 *
 */
class ImportController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
	}


	// this function will import a specific file in a specific location for Madison County
	public function import_madison() {
		$dataSource = ConnectionManager::getDataSource('default');	
		$dbhost = $dataSource->config['host'];
		$dbuser = $dataSource->config['login']; 
		$dbpass = "";
		$dbname = $dataSource->config['database'];
		$databaseTXT = 'C:\\Users\\Chad\\Desktop\\VoterDBImport\\VOTER DATABASES\\MADISON-COUNTY-2013.TXT';

		// create database connection		
		mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
		mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());

		$fp = fopen($databaseTXT,'r') or die ("can't open file");
		//var_dump($fp);		
		
		while ($s = fgets($fp,1024)) {
		    //VOTER COLUMNS
		    $voterId = trim(substr($s,0,15));  
		    $firstName = trim(substr($s,15,15));  
		    $middleName = trim(substr($s,30,15)); 
		    $lastName = trim(substr($s,45,20));
		    $suffix = trim(substr($s,65,8));
		    //var_dump($voterId);
		    //var_dump($firstName);
		    //var_dump($middleName);
		    //var_dump($lastName);
		    //var_dump($suffix);

		    //ADDRESS INFORMATION
		    $addressLineOne = trim(substr($s,73,9)) . ' ' . trim(substr($s,82,30));
		    $apartment = trim(substr($s,115,10));
		    $apartmentNumber = trim(substr($s,125,10));
		    $addressLineTwo = trim(substr($s,135,35));
		    $addressLineThree = trim(substr($s,170,34));
		    $city = trim(substr($s,204,25));
		    $state = trim(substr($s,229,2));
		    $zipcode = trim(substr($s,231,5));
		    $zipcodePlus4 = trim(substr($s,236,4));
		    $dateandtimeFileCreated = trim(substr($s,240,15));
		   	$dateofBirth = trim(substr($s,255,8));
		   	$sex = trim(substr($s,263,1));
		    $eyeColor = trim(substr($s,264,3));
		    $height = trim(substr($s,267,1)) . '-' . trim(substr($s,268,2));
		    $telephoneNumber = trim(substr($s,270,11));
		    $registrationDate = trim(substr($s,281,8));
		    $registrationSource = trim(substr($s,289,30));
		 	//var_dump($addressLineOne);
		    //var_dump($apartment);
		    //var_dump($apartmentNumber);
		    //var_dump($addressLineTwo);
		   	//var_dump($addressLineThree);
		    //var_dump($city);
		    //var_dump($state);
		    //var_dump($zipcode);
		    //var_dump($zipcodePlus4);
		    //var_dump($dateandtimeFileCreated);
		   	//var_dump($dateofBirth);
		   	//var_dump($sex);
		    //var_dump($eyeColor);
		    //var_dump($height);
		    //var_dump($telephoneNumber);
		    //var_dump($registrationDate);
		    //var_dump($registrationSource);
			
			//AFFILIATION
			$affliation = trim(substr($s,319,3));
		    $town = trim(substr($s,322,3));
		    $ward = trim(substr($s,325,3));
		    $district = trim(substr($s,328,3));
		    $congressionalDistrict = trim(substr($s,331,3));
		    $senatorialDistrict = trim(substr($s,334,3));
		    $legislativeDistrict = trim(substr($s,337,3));
		    $schoolDistrict = trim(substr($s,340,3));
		   	$commonCouncilDistrict = trim(substr($s,343,3));
		    $countyLegislativeDistrict = trim(substr($s,346,3));
		    $villageCode = trim(substr($s,349,3));
		    $wardCSO = trim(substr($s,352,3));
		    $voterStatus = trim(substr($s,355,1));
		    $reason = trim(substr($s,356,10));
			//var_dump($affliation);
			//var_dump($town);
			//var_dump($ward);
			//var_dump($district);
			//var_dump($congressionalDistrict);
			//var_dump($senatorialDistrict);
			//var_dump($legislativeDistrict);
			//var_dump($schoolDistrict);
			//var_dump($commonCouncilDistrict);
			//var_dump($countyLegislativeDistrict);
			//var_dump($villageCode);
			//var_dump($wardCSO);
			//var_dump($voterStatus);
			//var_dump($reason);

		    // absentee
			$absentee = trim(substr($s,366,1));
		    //var_dump($absentee);

			// mailing adress
		    $mailingLine1 = trim(substr($s,367,80));
			$mailingLine2 = trim(substr($s,447,40));
			$mailingLine3 = trim(substr($s,487,40));
			$mailingCity = trim(substr($s,527,25));
			$mailingState = trim(substr($s,552,2));
			$mailingZip = trim(substr($s,554,5));
			$mailingZipPlus4 = trim(substr($s,559,4));
			//if ($mailingLine1 != '') {
			//	var_dump($mailingLine1);
			//	var_dump($mailingLine2);
			//	var_dump($mailingLine3);
			//	var_dump($mailingCity);
			//	var_dump($mailingState);
			//	var_dump($mailingZip);
			//	var_dump($mailingZipPlus4);
			//	die();
			//}

			//absentee address
			$absElectionCode = trim(substr($s,563,4));
		    $absCode = trim(substr($s,567,3));
		    $absApplicationDate = trim(substr($s,570,8));
		    $absAddress1 = trim(substr($s,578,40)) . ' ' . trim(substr($s,618,40));
		    $absAddress2 = trim(substr($s,658,40));
		    $absAddress3 = trim(substr($s,698,40));
		    $absCity = trim(substr($s,738,25));
		    $absState = trim(substr($s,763,2));
		    $absZip = trim(substr($s,765,5));
		    $absZipPlus4 = trim(substr($s,770,4));		    
		    $absBallotIssued = trim(substr($s,774,8));
		    $absBallotReceived = trim(substr($s,782,8));
		    $absBallotReissued = trim(substr($s,790,8));
		    $absBallotRereceived = trim(substr($s,798,8));
		    $absExpirationDate = trim(substr($s,806,8));
		    $absEligible = trim(substr($s,814,1));
		    //if ($absAddress1 != '') {
			//	var_dump($absElectionCode);
			//    var_dump($absCode);
			//    var_dump($absApplicationDate);
			//    var_dump($absAddress1);
			//    var_dump($absAddress2);
			//    var_dump($absAddress3);
			//    var_dump($absCity);
			//    var_dump($absState);
			//    var_dump($absZip);
			//    var_dump($absZipPlus4);		    
			//    var_dump($absBallotIssued);
			//    var_dump($absBallotReceived);
			//    var_dump($absBallotReissued);
			//    var_dump($absBallotRereceived);
			//    var_dump($absExpirationDate);
			//    var_dump($absEligible);
			//	  die();
			//}

		    // mising election history! (at end of text file line)

   		    //remove special characters for SQL insert
		    $firstName = mysql_real_escape_string($firstName);
		    $middleName = mysql_real_escape_string($middleName);
		    $lastName = mysql_real_escape_string($lastName);
		    $apartmentNumber = mysql_real_escape_string($apartmentNumber);
		    $addressLineOne = mysql_real_escape_string($addressLineOne);
		    $addressLineTwo = mysql_real_escape_string($addressLineTwo);
		    $addressLineThree = mysql_real_escape_string($addressLineThree);
		    $mailingLine1 = mysql_real_escape_string($mailingLine1);
		    $mailingLine2 = mysql_real_escape_string($mailingLine2);
		    $mailingLine3 = mysql_real_escape_string($mailingLine3);
		    $absAddress1 = mysql_real_escape_string($absAddress1);
		    $absAddress2 = mysql_real_escape_string($absAddress2);
		    $absAddress3 = mysql_real_escape_string($absAddress3);

			$sql = "INSERT INTO voter (Source, SourceID, FirstName, LastName, MiddleName, Suffix, DOB, Gender, EyeColor, Created, Height, Phone" .
				") VALUES ('Madison County','$voterId','$firstName','$lastName','$middleName','$suffix','$dateofBirth','$sex','$eyeColor','$dateandtimeFileCreated','$height','$telephoneNumber')";
			//var_dump($sql);
			//die();

			if (!mysql_query($sql)) {
				die('Invalid query: ' . mysql_error());
    		} else {
        		// get primary key of record
        		$voterPrimaryKey = mysql_insert_id();
				//var_dump($voterPrimaryKey);
				//die();    			

        		// do we have residential address?
        		if ($addressLineOne !== NULL && trim($addressLineOne) !== '') {
        			$sql = "INSERT INTO address (Address1, Address2, Address3, Apartment, City, State, Zip) " .
        				"VALUES ('$addressLineOne','$addressLineTwo','$addressLineThree','$apartmentNumber','$city','$state','$zipcode');";
        			//var_dump($sql);
        			if (!mysql_query($sql)) {
						die('Invalid query: ' . mysql_error());
    				} else {
        				// get primary key of record
        				$residentialAddressPrimaryKey = mysql_insert_id();
        				//var_dump($residentialAddressPrimaryKey);
        				$sql = "UPDATE voter SET AddressResidentialID=" . $residentialAddressPrimaryKey . " WHERE VoterID=" . $voterPrimaryKey;
        				//var_dump($sql);
        				if (!mysql_query($sql)) {
							die('Invalid query: ' . mysql_error());
    					}
        			}
    			}

    			// do we have mailing address?
    			if($mailingAddress !== NULL && trim($mailingAddress) !== '') {
    				$sql = "INSERT INTO address (Address1, Address2, Address3, Apartment, City, State, Zip) " .
        				"VALUES ('$mailingLine1','$mailingLine2','$mailingLine3','','$mailingCity','$mailingState','$mailingZip');";
        			//var_dump($sql);
        			if (!mysql_query($sql)) {
						die('Invalid query: ' . mysql_error());
    				} else {
        				// get primary key of record
        				$mailingAddressPrimaryKey = mysql_insert_id();
        				$sql = "UPDATE voter SET AddressMailingID=" . $mailingAddressPrimaryKey . " WHERE VoterID=" . $voterPrimaryKey;
        				//var_dump($sql);
        				if (!mysql_query($sql)) {
							die('Invalid query: ' . mysql_error());
    					}
    				}
    			}

    			// do we have a absentee address?
    			if($absentee == 'Y') {
    				$sql = "INSERT INTO address (Address1, Address2, Address3, Apartment, City, State, Zip) " .
        				"VALUES ('$absAddress1','$absAddress2','$absAddress3','','$absCity','$absState','$absZip');";
        			//var_dump($sql);
        			if (!mysql_query($sql)) {
						die('Invalid query: ' . mysql_error());
    				} else {
        				// get primary key of record
        				$absenteeAddressPrimaryKey = mysql_insert_id();
        				$sql = "UPDATE voter SET AddressAbsenteeID=" . $absenteeAddressPrimaryKey . " WHERE VoterID=" . $voterPrimaryKey;
        				//var_dump($sql);
        				if (!mysql_query($sql)) {
							die('Invalid query: ' . mysql_error());
    					}
    				}
    			}
    			
    			// insert affilication information
    			$sql = "INSERT INTO affiliation (Party, County, Town, Ward, District, CongressionalDistrict, SenatorialDistrict, LegislativeDistrict, SchoolDistrict, CommonCouncilDistrict, CountyLegislativeDistrict, VillageCode)" .
    				"VALUES ('$affliation','Orange','$town','$ward','$district','$congressionalDistrict','$senatorialDistrict','$legislativeDistrict','$schoolDistrict','$commonCouncilDistrict','$countyLegislativeDistrict','$villageCode');";
    			//var_dump($sql);
    			if (!mysql_query($sql)) {
					die('Invalid query: ' . mysql_error());
				} else {
    				// get primary key of record
    				$affiliationID = mysql_insert_id();
    				$sql = "UPDATE voter SET AffiliationID=" . $affiliationID . " WHERE VoterID=" . $voterPrimaryKey;
    				//var_dump($sql);
        			if (!mysql_query($sql)) {
						die('Invalid query: ' . mysql_error());
					}
				}
    		}
    	}

		fclose($fp) or die("can't close file");	
		var_dump("SUCCESS!!!");
		die();
	}


	// this function will import a specific file in a specific location for Orange County
	public function import_orange() {
		$dataSource = ConnectionManager::getDataSource('default');	
		$dbhost = $dataSource->config['host'];
		$dbuser = $dataSource->config['login']; 
		$dbpass = "";
		$dbname = $dataSource->config['database'];
		$databaseTXT = 'C:\\Users\\Chad\\Desktop\\VoterDBImport\\VOTER DATABASES\\ORANGE-COUNTY-2012.txt';

		// create database connection		
		mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
		mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());

		$fp = fopen($databaseTXT,'r') or die ("can't open file");
		//var_dump($fp);
		//die();

		
		//$i = 0; 
		while ($s = fgets($fp,1024)) {
		//while ($i<2) {
			//$i++;
			//$s = fgets($fp,1024);

		    //2 LETTER PREFIX REFLECT TYPE OF ELECTION. 2 DIGIT CODE REFLECT YEAR.
		    //PP = PRESIDENTIAL PRIMARY
		    //PE = PRIMARY ELECTION
		    //GE = GENERAL ELECTION
		    //PF = NEW JUNE 26 FEDERAL PRIMARY
		    //SE = SPECIAL ELECTION
		    $PE00 = '';
		    $PP00 = '';
		    $PE01 = '';
		    $PE02 = '';
		    $PE03 = '';
		    $PE04 = '';
		    $PP04 = '';
		    $GE04 = '';
		    $PE05 = '';
		    $PE06 = '';
		    $GE06 = '';
		    $PE07 = '';
		    $GE07 = '';
		    $PE08 = '';
		    $PP08 = '';
		    $GE08 = '';
		    $PE09 = '';
		    $GE09 = '';
		    $PE10 = '';
		    $GE10 = '';
		    $PE10 = '';
		    $GE10 = '';
		    $PE11 = '';
		    $GE11 = '';
		    $PE12 = '';
		    $PP12 = '';
		    $GE12 = '';
		    $PF12 = '';
		    $SE12 = '';
		    
		    //VOTER COLUMNS
		    $voterArray[1] = $voterId = trim(substr($s,0,15));  // first field:  first 10 characters of the line
		    $voterArray[2] = $firstName = trim(substr($s,15,15));  // second field: next 5 characters of the line
		    $voterArray[3] = $middleName = trim(substr($s,30,15)); // third field:  next 12 characters of the line
		    $voterArray[4] = $lastName = trim(substr($s,45,20));
		    $voterArray[5] = $suffix = trim(substr($s,65,4));
		    $voterArray[16] = $dateandtimeFileCreated = trim(substr($s,240,15));
		    $voterArray[17] = $dateofBirth = trim(substr($s,255,8));
		    $voterArray[18] = $sex = trim(substr($s,263,1));
		    $voterArray[19] = $eyeColor = trim(substr($s,264,3));
		    $voterArray[20] = $height = trim(substr($s,267,1)) . '-' . trim(substr($s,268,2));
		    $voterArray[21] = $height = trim(substr($s,267,1)) . '-' . trim(substr($s,268,2));
		    $voterArray[22] = $telephoneNumber = trim(substr($s,270,3)) . '-' . trim(substr($s,273,8));
		    $voterArray[23] = $telephoneNumber = trim(substr($s,270,3)) . '-' . trim(substr($s,273,8));
		    $voterArray[24] = $registrationDate = trim(substr($s,281,8));
		    $voterArray[25] = $registrationSource = trim(substr($s,289,10));
		    
		    //ADDRESS INFORMATION
		    //$voterArray[6] = $streetNumber = trim(substr($s,69,8));
		    $voterArray[6] = $addressLineOne = trim(substr($s,69,8)) . ' ' . trim(substr($s,82,30));
		    $voterArray[7] = $halfCode = trim(substr($s,77,5));
		    $voterArray[8] = $streetName = trim(substr($s,82,30));
		    $voterArray[9] = $apartmentNumber = trim(substr($s,112,12));
		    $voterArray[10] = $addressLineTwo = trim(substr($s,124,40));
		    $voterArray[11] = $addressLineThree = trim(substr($s,164,5));
		    $voterArray[12] = $city = trim(substr($s,204,25));
		    $voterArray[13] = $state = trim(substr($s,229,2));
		    $voterArray[14] = $zipcode = trim(substr($s,231,5));
		    $voterArray[15] = $zipcodePlus4 = trim(substr($s,236,4));
		    
		    $mailingAddress = trim(substr($s,367,40));
		    if($mailingAddress !== NULL) {
			    $voterArray[42] = $mailingLine1 = trim(substr($s,367,40)) . ' ' . trim(substr($s,407,40));
			    $voterArray[43] = $mailingLine2 = trim(substr($s,447,40));
			    $voterArray[44] = $mailingLine3 = trim(substr($s,487,40));
			    //$voterArray[45] = $mailingLine4 = trim(substr($s,487,40));
			    $voterArray[46] = $mailingCity = trim(substr($s,527,25));
			    $voterArray[47] = $mailingState = trim(substr($s,552,2));
			    $voterArray[48] = $mailingZip = trim(substr($s,554,5));
			    $voterArray[49] = $mailingZipPlus4 = trim(substr($s,559,4));
		    }

		    $voterArray[41] = $absentee = trim(substr($s,366,1));
		    $voterArray[50] = $absElectionCode = trim(substr($s,563,4));
		    $voterArray[51] = $absCode = trim(substr($s,567,3));
		    $voterArray[52] = $absApplicationDate = trim(substr($s,570,8));
		    $voterArray[53] = $absAddress1 = trim(substr($s,578,40)) . ' ' .trim(substr($s,618,40));
		    $voterArray[54] = $absAddress2 = trim(substr($s,658,40));
		    $voterArray[55] = $absAddress3 = trim(substr($s,698,40));
		    //$voterArray[56] = $absAddress4 = trim(substr($s,698,40));
		    $voterArray[57] = $absCity = trim(substr($s,738,25));
		    $voterArray[58] = $absState = trim(substr($s,763,2));
		    $voterArray[59] = $absZip = trim(substr($s,765,5));
		    $voterArray[60] = $absZipPlus4 = trim(substr($s,770,4));
		    
		    //AFFILIATION
		    $voterArray[26] = $filler = trim(substr($s,299,20));
		    $voterArray[27] = $affliation = trim(substr($s,319,3));
		    $voterArray[28] = $town = trim(substr($s,322,3));
		    $voterArray[29] = $ward = trim(substr($s,325,3));
		    $voterArray[30] = $district = trim(substr($s,328,3));
		    $voterArray[31] = $congressionalDistrict = trim(substr($s,331,3));
		    $voterArray[32] = $senatorialDistrict = trim(substr($s,334,3));
		    $voterArray[33] = $legislativeDistrict = trim(substr($s,337,3));
		    $voterArray[34] = $schoolDistrict = trim(substr($s,340,3));
		    $voterArray[35] = $commonCouncilDistrict = trim(substr($s,343,3));
		    $voterArray[36] = $countyLegislativeDistrict = trim(substr($s,346,3));
		    $voterArray[37] = $villageCode = trim(substr($s,349,3));
		    
		    // others
		    $voterArray[38] = $wardCSO = trim(substr($s,352,3));
		    $voterArray[39] = $voterStatus = trim(substr($s,355,1));
		    $voterArray[40] = $reason = trim(substr($s,356,10));
		    $voterArray[61] = $absBallotIssued = trim(substr($s,774,8));
		    $voterArray[62] = $absBallotReceived = trim(substr($s,782,8));
		    $voterArray[63] = $absBallotReissued = trim(substr($s,790,8));
		    $voterArray[64] = $absBallotRereceived = trim(substr($s,798,8));
		    $voterArray[65] = $absExpirationDate = trim(substr($s,806,8));
		    $voterArray[66] = $absEligible = trim(substr($s,814,1));
		    $voterArray[68] = $voterhistTotal = trim(substr($s,815,48));
		    $absIneligible ='';
		    
		    $voterhistTotal = str_replace('^','',$voterhistTotal);
		    
		    $voterArray[68] = $voterhist1 = substr($voterhistTotal, 0, 4);
		    $voterArray[69] = $voterhist2 = substr($voterhistTotal, 4, 4);
		    $voterArray[70] = $voterhist3 = substr($voterhistTotal, 8, 4);
		    $voterArray[71] = $voterhist4 = substr($voterhistTotal, 12, 4);
		    $voterArray[72] = $voterhist5 = substr($voterhistTotal, 16, 4);
		    $voterArray[73] = $voterhist6 = substr($voterhistTotal, 20, 4);
		    $voterArray[74] = $voterhist7 = substr($voterhistTotal, 24, 4);
		    $voterArray[75] = $voterhist8 = substr($voterhistTotal, 28, 4);
		    $voterArray[76] = $voterhist9 = substr($voterhistTotal, 32, 4);
		    $voterArray[77] = $voterhist10 = substr($voterhistTotal, 36, 4);
		    $voterArray[78] = $voterhist11 = substr($voterhistTotal, 40, 4);
		    $voterArray[79] = $voterhist12 = substr($voterhistTotal, 44, 4);
		    //var_dump($voterArray);
		    //die();
		    
		    //remove special characters for SQL insert
		    $firstName = mysql_real_escape_string($firstName);
		    $middleName = mysql_real_escape_string($middleName);
		    $lastName = mysql_real_escape_string($lastName);
		    $apartmentNumber = mysql_real_escape_string($apartmentNumber);
		    $addressLineOne = mysql_real_escape_string($addressLineOne);
		    $addressLineTwo = mysql_real_escape_string($addressLineTwo);
		    $addressLineThree = mysql_real_escape_string($addressLineThree);
		    $mailingLine1 = mysql_real_escape_string($mailingLine1);
		    $mailingLine2 = mysql_real_escape_string($mailingLine2);
		    $mailingLine3 = mysql_real_escape_string($mailingLine3);
		    //$mailingLine4 = mysql_real_escape_string($mailingLine4);
		    $absAddress1 = mysql_real_escape_string($absAddress1);
		    $absAddress2 = mysql_real_escape_string($absAddress2);
		    $absAddress3 = mysql_real_escape_string($absAddress3);
		    //$absAddress4 = mysql_real_escape_string($absAddress4);
		    
		    
		    //THE TEAM2000 COMPUTER SYSTEM FROM BOARD OF ELECTIONS CAN ONLY STORE A MAXIMUM OF 12 VOTING HISTORIES. 
		    //IT'S EASIER TO SEARCH A VOTERS HISTORY BY CREATING A SEPARATE SET OF COLUMNS BY VOTING YEAR. 
		    /*
		    if ($voterhist1 == "PE00" || $voterhist2 == "PE00" || $voterhist3 == "PE00" || $voterhist4 == "PE00" || $voterhist5 == "PE00" || $voterhist6 == "PE00" || $voterhist7 == "PE00" || $voterhist8 == "PE00" || $voterhist9 == "PE00" || $voterhist10 == "PE00" || $voterhist11 == "PE00" || $voterhist12 == "PE00")     {         $PE01 = 'Y';    }
		    if ($voterhist1 == "PP00" || $voterhist2 == "PP00" || $voterhist3 == "PP00" || $voterhist4 == "PP00" || $voterhist5 == "PP00" || $voterhist6 == "PP00" || $voterhist7 == "PP00" || $voterhist8 == "PP00" || $voterhist9 == "PP00" || $voterhist10 == "PP00" || $voterhist11 == "PP00" || $voterhist12 == "PP00")     {         $PP00 = 'Y';    }
		    if ($voterhist1 == "PE01" || $voterhist2 == "PE01" || $voterhist3 == "PE01" || $voterhist4 == "PE01" || $voterhist5 == "PE01" || $voterhist6 == "PE01" || $voterhist7 == "PE01" || $voterhist8 == "PE01" || $voterhist9 == "PE01" || $voterhist10 == "PE01" || $voterhist11 == "PE01" || $voterhist12 == "PE01")     {         $PE01 = 'Y';    }
		    if ($voterhist1 == "PE02" || $voterhist2 == "PE02" || $voterhist3 == "PE02" || $voterhist4 == "PE02" || $voterhist5 == "PE02" || $voterhist6 == "PE02" || $voterhist7 == "PE02" || $voterhist8 == "PE02" || $voterhist9 == "PE02" || $voterhist10 == "PE02" || $voterhist11 == "PE02" || $voterhist12 == "PE02")     {         $PE02 = 'Y';    }
		    if ($voterhist1 == "PE03" || $voterhist2 == "PE03" || $voterhist3 == "PE03" || $voterhist4 == "PE03" || $voterhist5 == "PE03" || $voterhist6 == "PE03" || $voterhist7 == "PE03" || $voterhist8 == "PE03" || $voterhist9 == "PE03" || $voterhist10 == "PE03" || $voterhist11 == "PE03" || $voterhist12 == "PE03")     {         $PE03 = 'Y';    }
		    if ($voterhist1 == "PE04" || $voterhist2 == "PE04" || $voterhist3 == "PE04" || $voterhist4 == "PE04" || $voterhist5 == "PE04" || $voterhist6 == "PE04" || $voterhist7 == "PE04" || $voterhist8 == "PE04" || $voterhist9 == "PE04" || $voterhist10 == "PE04" || $voterhist11 == "PE04" || $voterhist12 == "PE04")     {         $PE04 = 'Y';    }
		    if ($voterhist1 == "PP04" || $voterhist2 == "PP04" || $voterhist3 == "PP04" || $voterhist4 == "PP04" || $voterhist5 == "PP04" || $voterhist6 == "PP04" || $voterhist7 == "PP04" || $voterhist8 == "PP04" || $voterhist9 == "PP04" || $voterhist10 == "PP04" || $voterhist11 == "PP04" || $voterhist12 == "PP04")     {        $PP04 = 'Y';    }
		    if ($voterhist1 == "GE04" || $voterhist2 == "GE04" || $voterhist3 == "GE04" || $voterhist4 == "GE04" || $voterhist5 == "GE04" || $voterhist6 == "GE04" || $voterhist7 == "GE04" || $voterhist8 == "GE04" || $voterhist9 == "GE04" || $voterhist10 == "GE04" || $voterhist11 == "GE04" || $voterhist12 == "GE04")     {        $GE04 = 'Y';    }
		    if ($voterhist1 == "PE05" || $voterhist2 == "PE05" || $voterhist3 == "PE05" || $voterhist4 == "PE05" || $voterhist5 == "PE05" || $voterhist6 == "PE05" || $voterhist7 == "PE05" || $voterhist8 == "PE05" || $voterhist9 == "PE05" || $voterhist10 == "PE05" || $voterhist11 == "PE05" || $voterhist12 == "PE05")     {         $PE05 = 'Y';    }
		    if ($voterhist1 == "PE06" || $voterhist2 == "PE06" || $voterhist3 == "PE06" || $voterhist4 == "PE06" || $voterhist5 == "PE06" || $voterhist6 == "PE06" || $voterhist7 == "PE06" || $voterhist8 == "PE06" || $voterhist9 == "PE06" || $voterhist10 == "PE06" || $voterhist11 == "PE06" || $voterhist12 == "PE06")     {         $PE06 = 'Y';    }
		    if ($voterhist1 == "GE06" || $voterhist2 == "GE06" || $voterhist3 == "GE06" || $voterhist4 == "GE06" || $voterhist5 == "GE06" || $voterhist6 == "GE06" || $voterhist7 == "GE06" || $voterhist8 == "GE06" || $voterhist9 == "GE06" || $voterhist10 == "GE06" || $voterhist11 == "GE06" || $voterhist12 == "GE06")     {        $GE06 = 'Y';    }
		    if ($voterhist1 == "PE07" || $voterhist2 == "PE07" || $voterhist3 == "PE07" || $voterhist4 == "PE07" || $voterhist5 == "PE07" || $voterhist6 == "PE07" || $voterhist7 == "PE07" || $voterhist8 == "PE07" || $voterhist9 == "PE07" || $voterhist10 == "PE07" || $voterhist11 == "PE07" || $voterhist12 == "PE07")     {        $PE07 = 'Y';    }
		    if ($voterhist1 == "GE07" || $voterhist2 == "GE07" || $voterhist3 == "GE07" || $voterhist4 == "GE07" || $voterhist5 == "GE07" || $voterhist6 == "GE07" || $voterhist7 == "GE07" || $voterhist8 == "GE07" || $voterhist9 == "GE07" || $voterhist10 == "GE07" || $voterhist11 == "GE07" || $voterhist12 == "GE07")     {        $GE07 = 'Y';    }
		    if ($voterhist1 == "PE08" || $voterhist2 == "PE08" || $voterhist3 == "PE08" || $voterhist4 == "PE08" || $voterhist5 == "PE08" || $voterhist6 == "PE08" || $voterhist7 == "PE08" || $voterhist8 == "PE08" || $voterhist9 == "PE08" || $voterhist10 == "PE08" || $voterhist11 == "PE08" || $voterhist12 == "PE08")     {        $PE08 = 'Y';    }
		    if ($voterhist1 == "PP08" || $voterhist2 == "PP08" || $voterhist3 == "PP08" || $voterhist4 == "PP08" || $voterhist5 == "PP08" || $voterhist6 == "PP08" || $voterhist7 == "PP08" || $voterhist8 == "PP08" || $voterhist9 == "PP08" || $voterhist10 == "PP08" || $voterhist11 == "PP08" || $voterhist12 == "PP08")     {        $PP08 = 'Y';    }
		    if ($voterhist1 == "GE08" || $voterhist2 == "GE08" || $voterhist3 == "GE08" || $voterhist4 == "GE08" || $voterhist5 == "GE08" || $voterhist6 == "GE08" || $voterhist7 == "GE08" || $voterhist8 == "GE08" || $voterhist9 == "GE08" || $voterhist10 == "GE08" || $voterhist11 == "GE08" || $voterhist12 == "GE08")     {        $GE08 = 'Y';    }     
		    if ($voterhist1 == "PE09" || $voterhist2 == "PE09" || $voterhist3 == "PE09" || $voterhist4 == "PE09" || $voterhist5 == "PE09" || $voterhist6 == "PE09" || $voterhist7 == "PE09" || $voterhist8 == "PE09" || $voterhist9 == "PE09" || $voterhist10 == "PE09" || $voterhist11 == "PE09" || $voterhist12 == "PE09")     {        $PE09 = 'Y';    }  
		    if ($voterhist1 == "GE09" || $voterhist2 == "GE09" || $voterhist3 == "GE09" || $voterhist4 == "GE09" || $voterhist5 == "GE09" || $voterhist6 == "GE09" || $voterhist7 == "GE09" || $voterhist8 == "GE09" || $voterhist9 == "GE09" || $voterhist10 == "GE09" || $voterhist11 == "GE09" || $voterhist12 == "GE09")     {        $GE09 = 'Y';    } 
		    if ($voterhist1 == "PE10" || $voterhist2 == "PE10" || $voterhist3 == "PE10" || $voterhist4 == "PE10" || $voterhist5 == "PE10" || $voterhist6 == "PE10" || $voterhist7 == "PE10" || $voterhist8 == "PE10" || $voterhist9 == "PE10" || $voterhist10 == "PE10" || $voterhist11 == "PE10" || $voterhist12 == "PE10")     {        $PE10 = 'Y';    }
		    if ($voterhist1 == "GE10" || $voterhist2 == "GE10" || $voterhist3 == "GE10" || $voterhist4 == "GE10" || $voterhist5 == "GE10" || $voterhist6 == "GE10" || $voterhist7 == "GE10" || $voterhist8 == "GE10" || $voterhist9 == "GE10" || $voterhist10 == "GE10" || $voterhist11 == "GE10" || $voterhist12 == "GE10")     {        $GE10 = 'Y';    }    
		    if ($voterhist1 == "PE11" || $voterhist2 == "PE11" || $voterhist3 == "PE11" || $voterhist4 == "PE11" || $voterhist5 == "PE11" || $voterhist6 == "PE11" || $voterhist7 == "PE11" || $voterhist8 == "PE11" || $voterhist9 == "PE11" || $voterhist10 == "PE11" || $voterhist11 == "PE11" || $voterhist12 == "PE11")     {        $PE11 = 'Y';    }
		    if ($voterhist1 == "GE11" || $voterhist2 == "GE11" || $voterhist3 == "GE11" || $voterhist4 == "GE11" || $voterhist5 == "GE11" || $voterhist6 == "GE11" || $voterhist7 == "GE11" || $voterhist8 == "GE11" || $voterhist9 == "GE11" || $voterhist10 == "GE11" || $voterhist11 == "GE11" || $voterhist12 == "GE11")     {        $GE11 = 'Y';    } 
		    if ($voterhist1 == "GE12" || $voterhist2 == "GE12" || $voterhist3 == "GE12" || $voterhist4 == "GE12" || $voterhist5 == "GE12" || $voterhist6 == "GE12" || $voterhist7 == "GE12" || $voterhist8 == "GE12" || $voterhist9 == "GE12" || $voterhist10 == "GE12" || $voterhist11 == "GE12" || $voterhist12 == "GE12")     {        $GE12 = 'Y';    } 
		    if ($voterhist1 == "PE12" || $voterhist2 == "PE12" || $voterhist3 == "PE12" || $voterhist4 == "PE12" || $voterhist5 == "PE12" || $voterhist6 == "PE12" || $voterhist7 == "PE12" || $voterhist8 == "PE12" || $voterhist9 == "PE12" || $voterhist10 == "PE12" || $voterhist11 == "PE12" || $voterhist12 == "PE12")     {        $PE12 = 'Y';    } 
		    if ($voterhist1 == "PP12" || $voterhist2 == "PP12" || $voterhist3 == "PP12" || $voterhist4 == "PP12" || $voterhist5 == "PP12" || $voterhist6 == "PP12" || $voterhist7 == "PP12" || $voterhist8 == "PP12" || $voterhist9 == "PP12" || $voterhist10 == "PP12" || $voterhist11 == "PP12" || $voterhist12 == "PP12")     {        $PP12 = 'Y';    } 
		    if ($voterhist1 == "PF12" || $voterhist2 == "PF12" || $voterhist3 == "PF12" || $voterhist4 == "PF12" || $voterhist5 == "PF12" || $voterhist6 == "PF12" || $voterhist7 == "PF12" || $voterhist8 == "PF12" || $voterhist9 == "PF12" || $voterhist10 == "PF12" || $voterhist11 == "PF12" || $voterhist12 == "PF12")     {        $PF12 = 'Y';    } 
		    if ($voterhist1 == "SE12" || $voterhist2 == "SE12" || $voterhist3 == "SE12" || $voterhist4 == "SE12" || $voterhist5 == "SE12" || $voterhist6 == "SE12" || $voterhist7 == "SE12" || $voterhist8 == "SE12" || $voterhist9 == "SE12" || $voterhist10 == "SE12" || $voterhist11 == "SE12" || $voterhist12 == "SE12")     {        $SE12 = 'Y';    } 
			*/
		
			$sql = "INSERT INTO voter (Source, SourceID, FirstName, LastName, MiddleName, Suffix, DOB, Gender, EyeColor, Created, Height, Phone" .
				") VALUES ('ORANGE-COUNTY-2012.txt','$voterId','$firstName','$lastName','$middleName','$suffix','$dateofBirth','$sex','$eyeColor','$dateandtimeFileCreated','$height','$telephoneNumber')";
			//var_dump($sql);
			//die();
			
			// get last inserted UUID
			//$sql = "SELECT HEX(@last_uuid)";
			//$result = mysql_query($sql);
			//var_dump($result);
			//$row = mysql_fetch_row($result);
			//var_dump($row);
			//$id = $row[0];

			if (!mysql_query($sql)) {
				die('Invalid query: ' . mysql_error());
    		} else {
        		// get primary key of record
        		$voterPrimaryKey = mysql_insert_id();
				//var_dump($voterPrimaryKey);
				//die();    			

        		// do we have residential address?
        		if ($addressLineOne !== NULL && trim($addressLineOne) !== '') {
        			$sql = "INSERT INTO address (Address1, Address2, Address3, Apartment, City, State, Zip) " .
        				"VALUES ('$addressLineOne','$addressLineTwo','$addressLineThree','$apartmentNumber','$city','$state','$zipcode');";
        			//var_dump($sql);
        			if (!mysql_query($sql)) {
						die('Invalid query: ' . mysql_error());
    				} else {
        				// get primary key of record
        				$residentialAddressPrimaryKey = mysql_insert_id();
        				//var_dump($residentialAddressPrimaryKey);
        				$sql = "UPDATE voter SET AddressResidentialID=" . $residentialAddressPrimaryKey . " WHERE VoterID=" . $voterPrimaryKey;
        				//var_dump($sql);
        				if (!mysql_query($sql)) {
							die('Invalid query: ' . mysql_error());
    					}
        			}
    			}

    			// do we have mailing address?
    			if($mailingAddress !== NULL && trim($mailingAddress) !== '') {
    				$sql = "INSERT INTO address (Address1, Address2, Address3, Apartment, City, State, Zip) " .
        				"VALUES ('$mailingLine1','$mailingLine2','$mailingLine3','','$mailingCity','$mailingState','$mailingZip');";
        			//var_dump($sql);
        			if (!mysql_query($sql)) {
						die('Invalid query: ' . mysql_error());
    				} else {
        				// get primary key of record
        				$mailingAddressPrimaryKey = mysql_insert_id();
        				$sql = "UPDATE voter SET AddressMailingID=" . $mailingAddressPrimaryKey . " WHERE VoterID=" . $voterPrimaryKey;
        				//var_dump($sql);
        				if (!mysql_query($sql)) {
							die('Invalid query: ' . mysql_error());
    					}
    				}
    			}

    			// do we have a absentee address?
    			if($absentee == 'Y') {
    				$sql = "INSERT INTO address (Address1, Address2, Address3, Apartment, City, State, Zip) " .
        				"VALUES ('$absAddress1','$absAddress2','$absAddress3','','$absCity','$absState','$absZip');";
        			//var_dump($sql);
        			if (!mysql_query($sql)) {
						die('Invalid query: ' . mysql_error());
    				} else {
        				// get primary key of record
        				$absenteeAddressPrimaryKey = mysql_insert_id();
        				$sql = "UPDATE voter SET AddressAbsenteeID=" . $absenteeAddressPrimaryKey . " WHERE VoterID=" . $voterPrimaryKey;
        				//var_dump($sql);
        				if (!mysql_query($sql)) {
							die('Invalid query: ' . mysql_error());
    					}
    				}
    			}
    			
    			// insert affilication information
    			$sql = "INSERT INTO affiliation (Party, County, Town, Ward, District, CongressionalDistrict, SenatorialDistrict, LegislativeDistrict, SchoolDistrict, CommonCouncilDistrict, CountyLegislativeDistrict, VillageCode)" .
    				"VALUES ('$affliation','Orange','$town','$ward','$district','$congressionalDistrict','$senatorialDistrict','$legislativeDistrict','$schoolDistrict','$commonCouncilDistrict','$countyLegislativeDistrict','$villageCode');";
    			//var_dump($sql);
    			if (!mysql_query($sql)) {
					die('Invalid query: ' . mysql_error());
				} else {
    				// get primary key of record
    				$affiliationID = mysql_insert_id();
    				$sql = "UPDATE voter SET AffiliationID=" . $affiliationID . " WHERE VoterID=" . $voterPrimaryKey;
    				//var_dump($sql);
        			if (!mysql_query($sql)) {
						die('Invalid query: ' . mysql_error());
					}
				}
    		}
    	}
		fclose($fp) or die("can't close file");	
		var_dump("SUCCESS!!!");
		die();
	}


	public function import() {

		if ($this->request->is('post')) {
			//var_dump($_POST);
			//var_dump($_FILES);
			//var_dump($_FILES['uploadfile']);
			$fileName = $_FILES['uploadfile']['name'];
			$filePath = $_FILES['uploadfile']['tmp_name'];
        	//var_dump($filePath);
			
			// open the file
        	$handle = fopen($filePath, 'r');
         	//var_dump($handle);
         	//die();

        	// read the 1st row as headings
        	//$header = fgetcsv($handle);
        	//var_dump($header);
        	//die();

        	//$data = fgetcsv($handle);
        	//var_dump($data);
        	//die();

        	Controller::loadModel('Voter');
			//var_dump($votee->FirstName);
        	//die();

			$lines = file($filePath);
			foreach($lines as $line){
				// explode $line here using tab (\t) as delimiter
				//var_dump(explode("\t", $line));
				$row = array_filter(explode("  ", $line), 'strlen' );
				var_dump($row);
				
				$votee = new Voter();
				$votee->FirstName = trim($row[2]);
				$votee->LastName = $row[6];
				//$this->Voter->save($votee);
			}
			//var_dump($votee);
			die();


        	$numb = 0;
 			//while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        	while (($data = fgets($handle)) !== false) {
        		//$num = count($data);
        		echo $numb++ . "=" . $data[0];
        		//$votee['FirstName'] = $data[0][1];
			}
			//var_dump($votee);
			die();

        	//while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			//	for ($c=0; $c < $num; $c++) {
			//		echo $data[$c];
			//	}
			//}

			fclose($handle);
			die();
		}

	}

}