<?php
function loadFile($path, $data = []) {
  extract($data);
  require_once BASE_PATH . $path;
}

function prettyArray($array) {
  echo '<pre>';
    print_r($array);
  echo '</pre>';
  die();
}

function loadController($controllerPath) {
  require_once BASE_PATH . 'controllers/' . $controllerPath;
}

function loadView($viewPath, $data = []) {
  extract($data);
  require_once BASE_PATH . 'views/' . $viewPath;
}

function loadFont() {
  return '<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  ';
}

function inputField($inputData) {
  ?>
  <div class="form-field-wrapper <?php echo isset($inputData['error']) && $inputData['error'] ? 'field-error' : '' ?>">
    <label 
      class="form-field-label" 
      for="<?php echo $inputData['name'] ?>"
    >
      <?php echo $inputData['label'] ?>
    </label>
    <?php if($inputData['type'] === 'textarea'): ?>
      <textarea class="form-field-textarea" name="<?php echo $inputData['name'] ?>" id="<?php echo $inputData['name'] ?>"><?php echo htmlspecialchars($inputData['value'] ?? '') ?></textarea>
    <?php elseif($inputData['type'] === 'select'): ?>  

     <select class="form-field-select" name="<?php echo $inputData['name'] ?>" id="<?php echo $inputData['name'] ?>">
      <?php foreach($inputData['options'] as $key => $option): ?>
        <option <?php echo  isset($inputData['selected']) && abs($inputData['selected']) === abs($key) ? 'selected="selected"' : '' ?> value="<?php echo $key ?>"><?php echo $option ?></option>
      <?php endforeach; ?>  
     </select>
        
    <?php else: ?>
      <input 
        class="form-field-input" 
        type="<?php echo $inputData['type'] ?>" 
        name="<?php echo $inputData['name'] ?>" 
        id="<?php echo $inputData['name'] ?>" 
        value="<?php echo htmlspecialchars($inputData['value'] ?? '') ?>"
      /> 
    <?php endif; ?>
    <div class="form-field-error-message"><?php echo $inputData['error'] ?? '' ?></div>
  </div>
  <?php
}

function redirectURL($url) {
  header("Location: {$url}");
  die();
}

function formatPrice($number) {
  return '$' . number_format(clean($number), 2, '.', ',');
}

function formatDate($date, $format = 'M j, Y') {
  $timestamp = strtotime($date);
  return date($format, $timestamp);
}

function clean($value) {
  return htmlspecialchars($value);
}

function formatStockStatus($value) {
  if((int)$value === 1) {
    return 'In stocks';
  }
  return 'Out of stocks';
}

function loadSVG($svgFile) {
  include_once BASE_PATH . 'public/assets/images/' . $svgFile;
}

function loadStylesheet($fileName) {
  echo '<link href="/assets/css/'.$fileName.'" rel="stylesheet"/>';
}