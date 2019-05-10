<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <table>
            <thead>
                <tr style="background:#eee;">
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Presentación</th>
                    <th>Prec 01 Act</th>
                    <th>Prec 01 New</th>            
                    <th>Variacion ¢</th>
                    <th>Variacion %</th>
                    <th>Fecha Envio</th>
                    <th>Tipo</th>
                    <th>Clase</th>
                </tr>
            </thead>

            <?php foreach($this->model->Listar() as $r): ?>
                <tr>

                    <td><?php echo $r['codigo']; ?></td>
                    <td><?php echo $r['descripcion'];  ?></td>
                    <td><?php echo $r['presentacion']; ?></td>
                    <td><?php echo number_format ($r['acprec01'],2); ?></td>                    
                    <td><?php echo number_format ($r['newprec01'],2); ?></td>
                    <td><?php echo number_format ($r['variacion'],2); ?></td>
                    <td><?php echo $r['porcvar']; ?></td>
                    <td><?php echo $r['fecha_comun']; ?></td>    
                    <td><?php echo $r['tipo']; ?></td>   
                    <td><?php echo $r['clase']; ?></td>  
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>