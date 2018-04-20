<?php

    class View {
        public $data = [];
        private $templates = [];

        public function render() {
            foreach ($this->templates as $template) {
                $template['data'] = array_merge($this->data, $template['data']);

                if ($template['is_partial'] === true) {
                    template('partial.' . $template['name'], $template['data']);
                } else {
                    template($template['name'], $template['data']);
                }
            }
        }

        public function setData(array $data) {
            $this->data = $data;
        }

        public function setPartial(string $template, array $data = []) {
            $template = [
                'data'       => $data,
                'is_partial' => true,
                'name'       => $template
            ];

            array_push($this->templates, $template);
        }

        public function setTemplate(string $template, array $data = []) {
            $template = [
                'data'       => $data,
                'is_partial' => false,
                'name'       => $template
            ];

            array_push($this->templates, $template);
        }
    }