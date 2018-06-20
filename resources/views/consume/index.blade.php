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
	<table id="todo" class="table">
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
		$(()=>{
			$.get('http://laravel-api.coderoo.com.au/api/todos')
				.done(data=>populateTable(data));
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
