
function createModelInstance($path, $modelName) {
  require_once "models/".$path.".model.php";
  $class = new $modelName($path);
  return $class;
}
?>