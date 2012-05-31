<?php
    class Template
    {
        private $vars = array();

        public function __set($index, $value)
         {
            $this->vars[$index] = $value;
         }

        public function show($viewName)
        {
            try
            {
                $file = 'application/views/' . $viewName;

                if (!file_exists($file))
                    throw new Exception('View ' . $viewName . ' not found.');        else

                foreach ($this->vars as $key => $value)
                {
                    $$key = $value;
                }

                include($file);
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
                exit(0);
            }
        }
        public function partial($viewName)
        {
            try
            {
                $file = 'application/views/' . $viewName;

                if (!file_exists($file))
                    throw new Exception('View ' . $viewName . ' not found.');        else

                foreach ($this->vars as $key => $value)
                {    
                    $$key = $value;
                }

                ob_start();
                include $file;
                $contents .= ob_get_contents();
                ob_end_clean();
                return $contents;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
                exit(0);
            }
        }
    }
?>
