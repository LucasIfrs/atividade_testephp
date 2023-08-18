<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Incluindo o Bootstrap CSS -->
  <link rel="stylesheet" href="estilo/stylesheet.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="backend/javascript.js"></script>
  <title>Datamex Consulta</title>
  
</head>

<body>
  <img class="img-responsive" src="estilo/datamex.png" id="datamex">
   
  <div class="container">
    <div class="row search-bar">
      <div class="col-md-8 offset-md-.5">
      <form id="myform">
        <div class="input-group">
          <input type="text" name="campo" id="campo" class="form-control" placeholder="Pesquisar">
          <!-- <button type = "submit" class="btn btn-primary" type="button">Buscar</button> -->
        </div>
      </form>
          <div class='container' id = 'resultado'>
         
          </div>
          
        
      </div>
    </div>
  </div>
  
</body>

</html>