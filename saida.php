<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <title>
      Relatório
    </title>
    <link rel='stylesheet'
          type='text/css'
          href='estiloSaida.css'>
  </head>
  <body> 
  
    <?php
    
      $nomeAluno       = $_POST['nomeAluno'];
      $nomeDisciplina  = $_POST['nomeDisciplina'];
      $nomeProfessor   = $_POST['nomeProfessor'];
      $nomeCoordenador = $_POST['nomeCoordenador'];
      $nomeCurso       = $_POST['nomeCurso'];
      $notaProva1      = (float)str_replace(',', '.', $_POST['notaProva1']); 
      $notaProva2      = (float)str_replace(',', '.', $_POST['notaProva2']); 
      $notaProva3      = (float)str_replace(',', '.', $_POST['notaProva3']);      
      $notaTrabalhos   = (float)str_replace(',', '.', $_POST['notaTrabalhos']);  
      $linkImagem      = $_POST['linkImagem'];
      $simNao          = '';
      $soma            = $notaProva1 + $notaProva2 + $notaProva3 + $notaTrabalhos;
      
      $percentualNotaProva1    = ($notaProva1    * 100) / 15;
      $percentualNotaProva2    = ($notaProva2    * 100) / 25;
      $percentualNotaProva3    = ($notaProva3    * 100) / 35;      
      $percentualNotaTrabalhos = ($notaTrabalhos * 100) / 25;      
      
      if ($soma >= 90) {
        $conceito = 'Excelente';
      }
      else {
        if ($soma >= 80) {
          $conceito = 'Ótimo';
        }
        else {
          if ($soma >= 70) {          
            $conceito = 'Bom';
          }
          else {
            if ($soma >= 60) {
              $conceito = 'Ruim';
            }
            else {            
              $conceito = 'Péssimo';
              $simNao   = "<span style='color : red; font-weight : bold;'>".
			                    " NÃO </span>";
            }}}}
      
      $notaProva1Formatada = 
	    number_format($notaProva1, 2, ',', '.');		
      $notaProva2Formatada = 
	     number_format($notaProva2, 2, ',', '.');
      $notaProva3Formatada = 
	     number_format($notaProva3, 2, ',', '.');		 
      $notaTrabalhosFormatada = 
	    number_format($notaTrabalhos, 2, ',', '.');
      $percentProva1Formatado = 
	    number_format($percentualNotaProva1, 2, ',', '.');		
      $percentProva2Formatado = 
	    number_format($percentualNotaProva2, 2, ',', '.');
      $percentProva3Formatado = 
	    number_format($percentualNotaProva3, 2, ',', '.');	
      $percentTrabalhosFormatado = 
	    number_format($percentualNotaTrabalhos, 2, ',', '.');  
      
    ?>   

    <p class='titulo'>
      <img src='<?php echo $linkImagem; ?>' />    
    </p>

    <h2 class='titulo'>DECLARAÇÃO</h2>
    
    <p>Declaramos, para os devidos fins, que <?php echo $nomeAluno . $simNao; ?> concluiu satisfatoriamente as atividades da disciplina 
                                             <?php echo $nomeDisciplina; ?> do curso de <?php echo $nomeCurso; ?>.</p>
    
    <p>Segue o desempenho de <?php echo $nomeAluno; ?>:</p>    

    <table id='dados' class='titulo'>    
      <tr style='background-color : gray; color : white;'>
       <th>Critério      </th>
       <th>Valor total   </th>
       <th>Nota do aluno </th>
       <th>Desempenho (%)</th>     
      </tr>
      
      <tr>
       <td>Prova 1</td>
       <td>15     </td>
       <td><?php echo $notaProva1Formatada;    ?>   </td>
       <td><?php echo $percentProva1Formatado; ?>%  </td>
      </tr>

      <tr>
       <td>Prova 2                                   </td>
       <td>25                                        </td>
       <td><?php echo $notaProva2Formatada;    ?>    </td>
       <td><?php echo $percentProva2Formatado; ?>%   </td>
      </tr>
      
      <tr>
       <td>Prova 3                                   </td>
       <td>35                                        </td>
       <td><?php echo $notaProva3Formatada;    ?>    </td>
       <td><?php echo $percentProva3Formatado; ?>%   </td>
      </tr>      

      <tr>
       <td>Trabalhos                                 </td>
       <td>25                                        </td>
       <td><?php echo $notaTrabalhosFormatada; ?>    </td>
       <td><?php echo $percentTrabalhosFormatado; ?>%</td>
      </tr> 
    </table>   

    
    <p> 
      Com esse resultado, o conceito de 
      <?php echo $nomeAluno; ?> foi <em><?php echo $conceito; ?></em>,
      já que sua nota total foi de 
      <strong><?php echo $soma; ?></strong> pontos.
    </p>
    
    <p class='titulo'>
      Belo Horizonte, <?php echo date("d/m/Y"); ?> 
    </p>
    
    <p class='titulo'>
      _____________________________________<br />
      <?php echo $nomeProfessor; ?> - Professor(a)      
    </p>
    
    <p class='titulo'>
      _____________________________________<br />    
      <?php echo $nomeCoordenador; ?> - Coordenador(a)
    </p>    

  </body>
</html>
