<div class="section">
	<div class="container main-container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
			<?php if(strlen(msg)) echo $msg;?>
				<form action="<?= base_url('contactus') ?>" name="contactForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<div class="form-group">
						<label for="exampleFormControlInput1">First Name</label> <input type="text" class="form-control" name="firstname" id="firstname1" placeholder="First Name">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Last Name</label> <input type="text" class="form-control" name="lastname" id="lastname1" placeholder="Last Name">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Email address</label> <input type="email" class="form-control" name="email" id="email1" placeholder="name@example.com">
					</div>
					<input type="hidden" class="form-control" name="contactcheck" value="true" placeholder="name@example.com">
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Subject</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" name="subject" rows="3"></textarea>
					</div>
					<button type="button" class="btn-align-style" onClick="contact()">submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

        function contact(){

        	var name=document.contactForm.firstname.value;  
        	var lastname=document.contactForm.lastname.value;
        	var email=document.contactForm.email.value;  

        	if (name==null || name==""){  
        	  alert("Name can't be blank");  
        	  document.getElementById("firstname1").focus()
        	  return false;  
        	}else if(lastname==null || lastname==""){  
        	  alert("Lastname can't be blank");  
        	  document.getElementById("lastname1").focus();
        	  return false;  
        	  }else if(email==null || email==""){  
          	  alert("Email can't be blank");  
          	  document.getElementById("email1").focus();
          	  return false;  
          	  }
        	document.contactForm.submit();
        	}  
</script>

