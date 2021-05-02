<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
      $(function () {

        $('#request').on('submit', function (e) {
					var Input1 = document.getElementById("bank_code");
					var Input2 = document.getElementById("account_number");
					if(isNaN(Input2.value)){
						alert('Account Number must be a number')
						var modalRequest = false;
					}
					var Input3 = document.getElementById("amount");
					if(isNaN(Input3.value)){
						alert('Amount must be a number')
						var modalRequest = false;
					}
					var Input4 = document.getElementById("remark");
					if(Input1.value == '' || Input2.value == '' || Input3.value == '' || Input4.value == ''){
						alert('please fill the required field')
						var modalRequest = false;
					}
          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '<?php echo(site_url('home/request'));?>',
            data: $('#request').serialize(),
						dataType: 'json',
            success: function (vars) {
							document.getElementsByClassName("classId")[0].textContent = 'ID : ' + vars.id;
							document.getElementsByClassName("classBank")[0].textContent = 'Bank Code : ' + vars.bank_code;
							document.getElementsByClassName("classAccount")[0].textContent = 'Account Number : ' + vars.account_number;
							document.getElementsByClassName("classAmount")[0].textContent = 'Amount : ' + vars.amount;
							document.getElementsByClassName("classRemark")[0].textContent = 'Remark : ' + vars.remark;
							document.getElementsByClassName("classStatus")[0].textContent = 'Status : ' + vars.status;
							document.getElementsByClassName("classReceipt")[0].textContent = 'Receipt : ' + vars.receipt;
							document.getElementsByClassName("classTimeServed")[0].textContent = 'Time Served : ' + vars.time_served;
							if(modalRequest != false){
								$("#requestModal").modal('show');
							}
            }
          });
        });

      });
    </script>

		<script>
      $(function () {

        $('#check').on('submit', function (e) {
					var Input1 = document.getElementById("transaction_id");
					if(isNaN(Input1.value)){
						alert('ID must be a number')
						var modalRequest = false;
					}
					if(Input1.value == ''){
						alert('please fill the required field')
						var modalRequest = false;
					}
          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '<?php echo(site_url('home/check'));?>',
            data: $('#check').serialize(),
						dataType: 'json',
            success: function (res) {
							document.getElementsByClassName("classId2")[0].textContent = 'ID : ' + res.id;
							document.getElementsByClassName("classBank2")[0].textContent = 'Bank Code : ' + res.bank_code;
							document.getElementsByClassName("classAccount2")[0].textContent = 'Account Number : ' + res.account_number;
							document.getElementsByClassName("classAmount2")[0].textContent = 'Amount : ' + res.amount;
							document.getElementsByClassName("classRemark2")[0].textContent = 'Remark : ' + res.remark;
							document.getElementsByClassName("classStatus2")[0].textContent = 'Status : ' + res.status;
							document.getElementsByClassName("classReceipt2")[0].textContent = 'Receipt : ' + res.receipt;
							document.getElementsByClassName("classTimeServed2")[0].textContent = 'Time Served : ' + res.time_served;
							if(modalRequest != false){
								$("#checkModal").modal('show');
							}
            }
          });
        });

      });
    </script>


	<title>Home</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

		.modal {
	  display: none; /* Hidden by default */
	  position: fixed; /* Stay in place */
	  z-index: 1; /* Sit on top */
	  padding-top: 100px; /* Location of the box */
	  left: 0;
	  top: 0;
	  width: 100%; /* Full width */
	  height: 100%; /* Full height */
	  overflow: auto; /* Enable scroll if needed */
	  background-color: rgb(0,0,0); /* Fallback color */
	  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
	  background-color: #fefefe;
	  margin: auto;
	  padding: 20px;
	  border: 1px solid #888;
	  width: 80%;
	}

	/* The Close Button */
	.close {
	  color: #aaaaaa;
	  float: right;
	  font-size: 28px;
	  font-weight: bold;
	}

	.close:hover,
	.close:focus {
	  color: #000;
	  text-decoration: none;
	  cursor: pointer;
	}

	.modal2 {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content2 {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
	}

	/* The Close Button */
	.close2 {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close2:hover,
	.close2:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}
	</style>
</head>
<body>

<div>
	<h2>Welcome to Slightly-big Flip</h2>
	<h1>Here you can request to withdraw your balance to your account number and also you can check the status of your withdrawal</h1>
</div>
<div>
	<h1>Request Withdrawal</h1>
	<form id="request">
      <label>Bank Code : </label><input type="text" name="bank_code" value="" id="bank_code" placeholder="bni"><br>
			<label>Account Number : </label><input type="text" name="account_number" value="" id="account_number" placeholder="1234567890"><br>
			<label>Amount : </label><input type="text" name="amount" value="" id="amount" placeholder="10000"><br>
			<label>Remark : </label><input type="text" name="remark" value="" id="remark" placeholder="sample remark"><br>
      <input type="submit" value="submit" id="submitRequest">
  </form>
	<div id="requestModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<div class="classId"></div><br>
			<div class="classBank"></div><br>
			<div class="classAccount"></div><br>
			<div class="classAmount"></div><br>
			<div class="classRemark"></div><br>
			<div class="classStatus"></div><br>
			<div class="classReceipt"></div><br>
			<div class="classTimeServed"></div><br>
			<div><label>Please save the ID value to check your withdrawal status</label></div><br><br><br>
			<div><label><font style="font-size:10px">*If you click submit again it will create new withdrawal request, please be careful!</font></label></div><br>
		</div>

	</div>

	<h1>Check Status</h1>
	<form id="check">
      <label>Transaction ID : </label><input type="text" name="transaction_id" value="" id="transaction_id" placeholder="5535152564"><br>
      <input type="submit" value="submit" id="submitCheck">
  </form>
	<div id="checkModal" class="modal2">

		<!-- Modal content -->
		<div class="modal-content2">
			<span class="close2">&times;</span>
				<div class="classId2"></div><br>
				<div class="classBank2"></div><br>
				<div class="classAccount2"></div><br>
				<div class="classAmount2"></div><br>
				<div class="classRemark2"></div><br>
				<div class="classStatus2"></div><br>
				<div class="classReceipt2"></div><br>
				<div class="classTimeServed2"></div><br>
		</div>

	</div>
</div>

<script>
var modal = document.getElementById("requestModal");
var btn = document.getElementById("submitRequest");
var span = document.getElementsByClassName("close")[0];

// btn.onclick = function() {
//   modal.style.display = "block";
// }

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
var modal2 = document.getElementById("checkModal");
var btn2 = document.getElementById("submitCheck");
var span2 = document.getElementsByClassName("close2")[0];

// btn.onclick = function() {
//   modal.style.display = "block";
// }

span2.onclick = function() {
  modal2.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}
</script>
</body>
</html>
