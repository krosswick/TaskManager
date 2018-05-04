<?php

	class TasksViews {
		private $stylesheet = 'taskmanager.css';
		private $pageTitle = 'Human Resources';
		
		public function __construct() {

		}
		
		public function __destruct() {

		}
		
		public function taskListView($user, $tasks, $orderBy = 'title', $orderDirection = 'asc', $message = '') {
			$body = "<h1>List of Complaints</h1>\n";
		
			if ($message) {
				$body .= "<p class='message'>$message</p>\n";
			}
		
			$body .= "<p><a class='taskButton' href='index.php?view=taskform'>+ Add Task</a> <a class='taskButton' href='index.php?logout=1'>Logout</a></p>\n";
	
			if (count($tasks) < 1) {
				$body .= "<p>No complaints to display!</p>\n";
				return $this->page($body);
			}
	
			$body .= "<table>\n";
			$body .= "<tr><th>Delete</th><th>Edit</th>";
		
			$columns = array(array('name' => 'id', 'label' => 'ID'),
							array('name' => 'fileName', 'label' => 'Complainer'), // This is where the orginization tabs are added
							 array('name' => 'fileType', 'label' => 'Respondent'), 
							 array('name' => 'title', 'label' => 'Accusation'), 
							 array('name' => 'description', 'label' => 'Description'), 
							 array('name' => 'addDate', 'label' => 'Add Date'));
		
			// geometric shapes in unicode
			// http://jrgraphix.net/r/Unicode/25A0-25FF
			foreach ($columns as $column) {
				$name = $column['name'];
				$label = $column['label'];
				if ($name == $orderBy) {
					if ($orderDirection == 'asc') {
						$label .= " &#x25BC;";  // ▼
					} else {
						$label .= " &#x25B2;";  // ▲
					}
				}
				$body .= "<th><a class='order' href='index.php?orderby=$name'>$label</a></th>";
			}
	
			foreach ($tasks as $task) {
				$id = $task['id'];
				$fileName = $task['fileName'];
				$fileType = $task['fileType'];
				$addDate = $task['addDate'];
				$title = $task['title'];
				$description = ($task['description']) ? $task['description'] : '';
			
				$body .= "<tr>";
				$body .= "<td><form action='index.php' method='post'><input type='hidden' name='action' value='delete' /><input type='hidden' name='id' value='$id' /><input type='submit' value='Delete'></form></td>";
				$body .= "<td><form action='index.php' method='post'><input type='hidden' name='action' value='edit' /><input type='hidden' name='id' value='$id' /><input type='submit' value='Edit'></form></td>";
				$body .= "<td>$id</td>";
				$body .= "<td>$fileName</td><td>$fileType</td><td>$title</td><td>$description</td><td>$addDate</td>";
				$body .= "</tr>\n";
			}
			$body .= "</table>\n";
	
			return $this->page($body);
		}
		
		public function taskFormView($user, $data = null, $message = '') {
			$title = '';
			$description = '';
			$fileName = '';
			$fileType = '';

	
			$body = "<h1>Enter Complaint</h1>\n";

			if ($message) {
				$body .= "<p class='message'>$message</p>\n";
			}
		
			$body .= "<form action='index.php' method='post'>";
		
			if ($data['id']) {
				$body .= "<input type='hidden' name='action' value='update' />";
				$body .= "<input type='hidden' name='id' value='{$data['id']}' />";
			} else {
				$body .= "<input type='hidden' name='action' value='add' />";
			}
		
			$body .= <<<EOT2
        <p>Complainer (your name)<br />
        <input type="text" name="fileName" value="" placeholder="Name" maxlength="255" size="80"></p>
        <p>Respondent (their name)<br />
        <input type="text" name="fileType" value="" placeholder="Name" maxlength="255" size="80"></p>
        <p>

  <p>Accusation<br />
  <input type="text" name="title" value="$title" placeholder="Accusation" maxlength="255" size="80"></p>

  <p>Description (what happened)<br />
  <textarea name="description" rows="6" cols="80" placeholder="Description">$description</textarea></p>
  <input type="submit" name='submit' value="Submit"> <input type="submit" name='cancel' value="Cancel">
</form>
EOT2;

			return $this->page($body);
		}
		
		
		public function loginFormView($data = null, $message = '') {
			$loginID = '';
			if ($data) {
				$loginID = $data['loginid'];
			}
		
			$body = "<h1>Complaint Records Login</h1>\n";
			
			if ($message) {
				$body .= "<p class='message'>$message</p>\n";
			}
			
			$body .= <<<EOT
<form action='index.php' method='post'>
<input type='hidden' name='action' value='login' />
<p>User ID<br />
  <input type="text" name="loginid" value="$loginID" placeholder="login id" maxlength="255" size="80"></p>
<tle<br />
  <input type="password" name="password" value="" placeholder="password" maxlength="255" size="80"></p>
  <input type="submit" name='submit' value="Login">
</form>	
EOT;
			
			return $this->page($body);
		}
		
		public function errorView($message) {	
			$body = "<h1>Tasks</h1>\n";
			$body .= "<p>$message</p>\n";
			
			return $this->page($body);
		}
		
		private function page($body) {
			$html = <<<EOT
<!DOCTYPE html>
<html>
<head>
<title>{$this->pageTitle}</title>
<link rel="stylesheet" type="text/css" href="{$this->stylesheet}">
</head>
<body>
$body
<p>&copy; 2018 Kyle Rosswick, Perry Smith, Ryan Rottmann.</p>
</body>
</html>
EOT;
			return $html;
		}

}