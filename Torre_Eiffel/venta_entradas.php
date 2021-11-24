<?php
include 'head.php';
$Total_entradas=0;
$Entradas_Guia=0;
$Dinero_Final=0;

if (isset($_REQUEST['calcular']))
{
    
    
  //guia 5€ por persona, realizar calculo luego
    $Tipo=$_REQUEST['tipo'];
    $Fecha=$_REQUEST['fecha'];
    $Adultos=$_REQUEST['adultos'];
    $Jovenes=$_REQUEST['jovenes'];
    $Reducida=$_REQUEST['reducida'];

    
    $PrecioAdultos=0;
    $PrecioJovenes=0;
    $Precioespecial=0;

    if(isset($_REQUEST['tipo']))
      {
        if($Tipo==1)
          {
          $PrecioAdultos=16.7*$Adultos;
          $PrecioJovenes=8.4*$Jovenes;
          $Precioespecial=4.2*$Reducida;
          }
        if($Tipo==2)
          {
          $PrecioAdultos=26.1*$Adultos;
          $PrecioJovenes=13.10*$Jovenes;
          $Precioespecial=6.6*$Reducida;
          }
        if($Tipo==3)
          {
          $PrecioAdultos=10.5*$Adultos;
          $PrecioJovenes=5.2*$Jovenes;
          $Precioespecial=2.60*$Reducida;
          }
        if($Tipo==4)
          {
          $PrecioAdultos=19.90*$Adultos;
          $PrecioJovenes=9.90*$Jovenes;
          $Precioespecial=5*$Reducida;
          }
      }

    $montante_entradas=0;//para calcular el total de turistas, con el guia
    $montante_entradas=$Adultos+$Jovenes+$Reducida;
    

    
    $Total_entradas=$PrecioAdultos+$PrecioJovenes+$Precioespecial;
        //hacer un if para si hay mas de 10 o no
    
    if(isset($_REQUEST['opciones']))
        if($montante_entradas>9)
        {
          $Entradas_Guia=$montante_entradas*5;
        }
        else
        {
          echo '<script language="javascript">';//pongo una alerta para decir que pocos turistas para un guia
          echo 'alert("No puedes marcar esta opcion, no sois 10 o mas")';  
          echo '</script>';
        }
    $Dinero_Final=$Entradas_Guia+$Total_entradas;








}




print ' 
        <h2 class="postheader">Ventas en línea de entradas a la Torre Eiffel</h2><br>
                                     
        <div   class="postcontent"><form action="venta_entradas.php" method="post">
            <table align="center" class="content-layout">
            <tr>
              <td align="right"><strong>Elija las opciones que desee :</strong></td>
              <td colspan="2">
               
                
                 <input type="checkbox" name="opciones" value="5"  /> Con Guia (5 € por persona)(mínimo 10 personas)
              
                 
               </td>
               </tr>
              <tr>
                        <td align="right"><strong>Seleccione el Tipo de Entrada :</strong></td>
                        <td colspan="2">
                          <div align="left">
                                <select name="tipo">
                                  <option value="1">Billete de entrada ascensor 2ª Planta</option>
                                  <option value="2">Billete de ascensor Cima</option>
                                 <option value="3">Billete de escaleras 2ª Planta</option>
                                 <option value="4">Billete de escaleras + ascensor Cima</option>
                                </select>
                           </div>
                          </td>
              </tr>
               <tr>
               <td>
               <div align="left">
                    	<strong>Seleccione una fecha: </strong></td>
                         <td colspan="2"><input type="date" name="fecha"> </td>
                  
              </div>
               </tr>
                <tr>
                        <td align="right"><strong>Entradas Adultos :</strong></td>
                        <td colspan="2">
                          <input type="number" name="adultos"  value="0" min="0" max="20" size="5" required>
                        </td>
                          
              </tr>
               <tr>
                        <td align="right"><strong>Entradas Jovenes 12-24 años :</strong></td>
                        <td colspan="2">
                          <input type="number" name="jovenes" value="0" min="0" max="20" size="5">
                        </td>
                          
              </tr>
              <tr>
                        <td align="right"><strong>Personas con Tarifa Reducida :</strong></td>
                        <td colspan="2">
                          <input type="number" name="reducida" value="0" min="0" max="20" size="5">
                        </td>
                          
              </tr>
              
             
              
              
              
             
            <tr >
              <td colspan="3"><div align="center">
              
                  <input name="calcular" type="submit"  value="Calcular"/>
           
              </td>
            </tr>
        </table>
       
        
        <div id="imagen">
        <img src="images/torreeifel.png" width="250" height="400" alt="torreeifel"/>

        </div>
    </form>
    
    <br><br>
    <table >
    <tr>
    <td class="azul"><strong>Total</strong></td>
    </tr>
    
    <tr>
    <td class="azul"><strong>Precio  Entradas</strong></td>
    <td>
    <input type="text" name="precio_entradas" value="'.$Total_entradas.'" size="5" />
    </td>
    
    </tr>
    
    
    </tr>
    <tr>
    <td class="azul"><strong>Precio  Guia</strong></td>
    <td>
    <input type="text" name="precio_guia" value="'.$Entradas_Guia.'" size="5" />
    </td>
    
    </tr>
    <tr>
    <td class="azul"><strong>Precio  Total (Entradas  + Guia)</strong></td>
    <td>
    <input type="text" name="precio_total" value="'.$Dinero_Final.'" size="5" />
    </td>
    
    </tr>
     </table>
        </div>';

include 'pie.php';
