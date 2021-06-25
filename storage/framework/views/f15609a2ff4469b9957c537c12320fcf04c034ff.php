<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2010 Temperaturen</title>
    <style>
      * {font-family: "Comic Sans MS";}
      table {border: 1px solid black}
      td {text-align: right}
      .eenheid {border: 1px solid black;}
    </style>
  </head>
  <body>
    <form action="overzicht" method="get" no validate>
      <select name="maand" required onchange="submit()">
      <?php for($i = 1; $i <= 12; $i++): ?>
        <option value="<?php echo e($i); ?>" <?php if($i == $maand): ?> selected <?php endif; ?>><?php echo e($maanden[$i-1]->name); ?></option>
      <?php endfor; ?>
      </select>
      <br><br>
      <table>
        <tr>
          <td>
            <input type="radio" id="cf" name="eenheid" value="C" <?php if($eenheid=='C'): ?> checked <?php endif; ?> onclick="submit()"/>
          </td>
          <td>
            <label for="C">Celcius</label>
          </td>
          <td>
            <input type="radio" id="cf" name="eenheid" value="F" <?php if($eenheid=='F'): ?> checked <?php endif; ?> onclick="submit()"/>
          </td>
          <td>
            <label for="F">Fahrenheit</label>
          </td>
        </tr>
      </table>
    </form>
    <br>
    <form action="nieuwsbrief" method="post" no validate>
      <?php echo csrf_field(); ?>
      <label>E-mailadres:</label>
      <input type="email" required name="emailadres"/>
      <button type="submit">Vraag nieuwsbrief aan</button>
    </form>
    <h1><?php echo e($maanden[$maand-1]->name); ?></h1>
    <table>
      <tr><th>Dag</th><th>Minimum</th><th>Maximum</th></tr>
      <?php foreach ($metingen as $m)
        {
          $dag = $m->dagnr;
          $min = $m->minimum;
          $max = $m->maximum;
          echo "<tr><td>$dag</td><td>$min &deg;{$eenheid}</td><td>$max &deg;{$eenheid}</td></tr>";
        }
      ?>
    </table>
    <a href="<?php echo e(url('/contact')); ?>">Contact</a>
  </body>
</html><?php /**PATH C:\#School shit\Leerjaar 2\Periode 4\Web\Demos\mijnproject\resources\views/overzicht.blade.php ENDPATH**/ ?>