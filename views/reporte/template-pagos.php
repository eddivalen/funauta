<?php
  use yii\helpers\Html;
  use yii\grid\GridView;
?>
     <style type="text/css">
      body {
        font-family: "Helvetica Neue", Helvetica, Arial;
        font-size: 14px;
        line-height: 20px;
        font-weight: 400;
        color: #3b3b3b;
        -webkit-font-smoothing: antialiased;
        font-smoothing: antialiased;
      }
     table {
        margin: 0 0 40px 0;
        width: 100%;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        display: table;
      }
     .zebra th {
      padding: 10px;
      font-weight: 900;
      color: #ffffff;
      border-bottom: 1px solid #2980b9; 
      background: #2980b9; 
     }
     .zebra td{
        padding: 6px 12px;
        display: table-cell;
     }
     .break { page-break-before: always; }
     </style>
     <body>
     <h1 align="center" style="font-style: bold;">REPORTE DE PAGOS</h1>
     <h3 align="center" style="font-style: bold;"><?php echo date('d/m/Y') ?></h3>
      <table class="zebra">
      <thead>
       <tr>
        <th>No</th>
        <th>Nº DE REFERENCIA</th>
        <th>FECHA</th>
        <th>BANCO</th>
        <th>REPRESENTANTE</th>
        <th>MONTO</th>
       </tr>
      </thead>
      <?php
       $i=1;
       foreach($model as $data){
        
        echo '
         <tr>
          <td>'.$i.'</td>
          <td>'.$data['id_pago'].'</td>
          <td>'.$data['fecha'].'</td>
          <td>'.$data['banco'].'</td>
          <td>'.$data->rteCedula->nombre.' '.$data->rteCedula->apellido.'</td>
          <td>'.$data['monto'].'</td>
         </tr>
        ';
        $i++;
       }
      ?>
      <div class="break"></div>
     </table> 
     </body>
     