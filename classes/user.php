<?php

class user

{
	public function signup($user, $conn){
		
		$name = $user['fullname'];
		$email = $user['username'];
		$pass = $user['passkey'];

		$stmt = $conn->prepare('INSERT INTO logindb (Name, Email, Passkey) VALUES(:name, :email, :passkey)');
		$stmt->bindParam('name', $name);
		$stmt->bindParam('email', $email);
		$stmt->bindParam('passkey', $pass);
		$stmt->execute();
		sleep(2);
		
		return json_encode([
			"response" => "success",
			"msg" => "Account Created Sucessfully Done."
		]);
	}

	public function login($user, $conn){
			
		$email = $user['username'];
		$passkey = $user['passkey'];

		$stmt = $conn->prepare('SELECT * FROM logindb WHERE Email = :email');
		$stmt->bindParam('email', $email);
		$stmt->execute();
		
		$row = $stmt->fetch();
		
		if($passkey == $row['Passkey']){
	
			$_SESSION['logindata'] = [
				'id' => $row['id'],
				'name' => $row['Name'],
				'email' => $row['Email']
			];

			sleep(2);
			
			return json_encode([
				"response" => "success",
				"msg" => "Account Created Sucessfully Done."
			]);

			sleep(3);

		}
		else{
			sleep(2);
			return json_encode([
				"response" => "error",
				"msg" => "Incorrect username or password"
			]);
		}
	}

	public function saveBookmark($user, $conn, $id){
		
		$webName = $user['siteName'];
		$webUrl = $user['siteUrl'];

		$query = "INSERT INTO webdb (id, webName, webUrl) VALUES(:id, :webName, :webUrl)";
		$stmt = $conn->prepare($query);
			$stmt->bindParam('id', $id);
			$stmt->bindParam('webName', $webName);
			$stmt->bindParam('webUrl', $webUrl);
		$stmt->execute();

		return "saved";

	}

	public function changePassword($user, $conn){
		
		$oldPassword = $user['oldpasskey'];
		$newPassword = $user['newpasskey'];
		$cnewPassword = $user['cnewpasskey'];

		$query = "SELECT Passkey FROM logindb WHERE id=:id";
		$stmt = $conn->prepare($query);
		$stmt->bindParam('id', $_SESSION['logindata']['id']);
		$stmt->execute();

		$row = $stmt->fetch();

		if($oldPassword == $row[0]){

			if($newPassword == $cnewPassword){
					$updateQuery = "UPDATE logindb SET Passkey = :newpasskey WHERE id = :id";
					$stmt2 = $conn->prepare($updateQuery);
					$stmt2->bindParam('newpasskey', $newPassword);
					$stmt2->bindParam('id', $_SESSION['logindata']['id']);
					$stmt2->execute();

					return json_encode([
							"response" => "success",
							"msg" => "Password changed Successfull."
						]);
			}
			else{
				return json_encode([
				"response" => "unmatch_password",
				"msg" => "New Password not matched."
			]);
			}
		}
		else{
			 return json_encode([
				"response" => "oldPasswordError",
				"msg" => "incorrect old password."
			]);
		}
	}

}

?>