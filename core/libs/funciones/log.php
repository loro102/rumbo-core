<?php
/**
 * Created by PhpStorm.
 * User: loro102
 * Date: 10/01/2016
 * Time: 15:54
 */

/*
 * la implementación sería esta:
 *
 * <?php
 * include "Log.class.php";
 * $log = new Log("log", "./logs/");
 * echo $log->insert('Esto es un test!', false, true, true);
 *
 */
    class Log
    {
        public function __construct($filename, $path)
        {
            $this->path     = ($path) ? $path : "/";
            $this->filename = ($filename) ? $filename : "log";
            $this->date     = date("Y-m-d H:i:s");
            $this->ip       = ($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 0;
        }
        public function insert($text, $dated, $clear, $backup)
        {
            if ($dated) {
                $date   = "_" . str_replace(" ", "_", $this->date);
                $date   = str_replace(":","",$date);
                $append = null;
            }
            else {
                $date   = "";
                $append = ($clear) ? null : FILE_APPEND;
                if ($backup) {
                    $fecha  = str_replace(" ", "_", $this->date);
                    $fecha  = str_replace(":","",$fecha);
                    $result = (copy($this->path . $this->filename . ".log", $this->path . $this->filename . "_" . $fecha . "-backup.log")) ? 1 : 0;
                    $append = ($result) ? $result : FILE_APPEND;
                }
            };
            $log    = $this->date . " [ip] " . $this->ip . " [text] " . $text . PHP_EOL;
            $result = (file_put_contents($this->path . $this->filename . $date . ".log", $log, $append)) ? 1 : 0;

            return $result;
        }
    }

