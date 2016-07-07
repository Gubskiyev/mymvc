<?php
class View {
    public function generate($title, $content, $template,$data = NULL) {
        include 'app/view/'.$template;
    }
}