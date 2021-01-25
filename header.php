
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Arbres</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<style>

#Preview{
overflow-x: scroll;
}
</style>
<!--
<style>

ul, .myUL {
  list-style-type: none;
}

.myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */
  transform: rotate(90deg);  
}

.nested {
  display: none;
}

.active {
  display: block;
}
</style>-->

<body>

<div class="container">


<nav class="navbar navbar-expand-md bg-dark navbar-dark">
<a class="navbar-brand" href="index.php">OUTIL V1</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="arbre.php">Arbre</a>
    </li> 
    <li class="nav-item">
      <a class="nav-link" href="addtree.php">+Nouveau</a>
    </li> 
    <li class="nav-item">
      <a class="nav-link" href="tableaux.php">Tableaux</a>
    </li> 
    <li class="nav-item">
      <a class="nav-link" href="manage.php">Gérer</a>
    </li> 
 
    <li class="nav-item">
      <a class="nav-link" href="settings.php">Paramètre</a>
    </li>    
    </ul>
  </div>  
</nav>
</div>

<div class="container pt-5">

