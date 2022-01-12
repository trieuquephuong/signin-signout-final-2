<?php
	
	class database {
		private $server_database = "localhost";
		private $user_database = "root";
		private $pass_database = "";
		private $file_database = "signin-createnewaccount-form";
		private $conn;



		function connect () {
			$this->conn = new mysqli ($this->server_database, $this->user_database, $this->pass_database, $this->file_database);

			if ($this->conn->connect_error) {
				die("Kết nối thất bại" . $this->conn->connect_error);
			}
		}

		function disconnect() {
			$this->conn->close();
		}


		function inputdata($sql) {
			$this->connect();

			if ($this->conn->query($sql) === TRUE) {
				echo "Đăng kí thành công";
			} else {
				echo "Lỗi" .$sql ."<br>" .$this->conn->error;
			  }
			
			$this->disconnect();
		}


		function selectdata($sql) {
			$this->connect();

			$resultselect = $this->conn->query($sql);
			$row = $resultselect->fetch_assoc();
			
			$this->disconnect();
			return $row;
		}

	}
?>	