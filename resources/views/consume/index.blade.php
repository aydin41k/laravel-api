<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <div id="todo_container" class="container">
  	<h2>Todos</h2>
	<form id="form_todos">
	  <div class="form-group">
	    <label for="email">Email address</label>
	    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" id="password" placeholder="Password">
	  </div>
	  <div class="form-group">
	    <label for="client_id">Client ID</label>
	    <input type="text" class="form-control" id="client_id" placeholder="Client ID">
	  </div>
	  <div class="form-group">
	    <label for="client_secret">Client Token</label>
	    <input type="text" class="form-control" id="client_secret" placeholder="Token">
	  </div>
	  <div class="form-check">
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Check me out</label>
	  </div>
	  <button id="btn_login" type="submit" class="btn btn-primary">Submit</button>
	</form>  	
	<table id="todo" class="table hide">
		<thead>
			<tr>
				<th>Todo ID</th>
				<th>User ID</th>
				<th>Task</th>
				<th>Status</th>
				<th>Last updated</th>
			</tr>
		</thead>
		<tbody>
			<!-- Populate the To do list summary here-->
		</tbody>
	</table>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		// Quick and dirty scripting because can't be bothered to route a .js file
		const populateTable = data => {
			for(row of data) {
				row.status = (row.done) ? '<span class="text-success">Done</span>' : '<span class="text-danger">Not done</span>';
				row.updated = new Date(row.updated_at);
				$('#todo tbody').append(`
					<tr>
						<td>${row.id}</td>
						<td>${row.user_id}</td>
						<td>${row.task}</td>
						<td>${row.status}</td>
						<td>${row.updated.getDate()}.${row.updated.getMonth()}.${row.updated.getFullYear()}</td>
					</tr>
					`);
			}
		}
		const getToken = authResponse => {
			$.ajax({
				method: "GET",
				headers: { Authorization: 'Bearer '+authResponse.access_token },
				url: 'http://kh-api.test/api/todos',
				dataType: 'json'
			})
			.done(data=>populateTable(data));
		}
		const sendRequest = (request) => {
			$.ajax({
			  method: "POST",
			  headers: {Accept: 'application/json'},
			  url: "http://kh-api.test/oauth/token",
			  data: { 
			  	client_id: request.client_id, 
			  	client_secret: request.client_secret,
			  	// Secret: 6gVUBjxy3Ll9reH75fqVJwiKtAfQCAKbxBEUxivK	
			  	grant_type:'password',
			  	username: request.email,
			  	password: request.password,
			  	// Pass: secret
			  	scope:'*'
			  },
			  dataType: 'json',
			})
			.done(response=>getToken(response));
		};
		$('#btn_login').click((e)=>{
			e.preventDefault();
			const request = {
				email: $('#email').val(),
				password: $('#password').val(),
				client_id: $('#client_id').val(),
				client_secret: $('#client_secret').val()
			}
			sendRequest(request);
			$('#form_todos').slideUp(()=>{
				$('#todo').removeClass('hide');
			});
		});
	</script>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
