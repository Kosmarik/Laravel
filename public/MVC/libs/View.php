<?php

class View {

    public function render($templatePath){
        require $templatePath;
    }

}

?>