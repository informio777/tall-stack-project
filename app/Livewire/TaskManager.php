<?php

namespace App\Livewire;

use Livewire\Component;

class TaskManager extends Component
{
    public $tasks = [];
    public $newTask = '';

    public function mount()
    {
        $this->tasks = [
            ['id' => 1, 'text' => 'Изучить Laravel', 'completed' => true],
            ['id' => 2, 'text' => 'Настроить Tailwind CSS', 'completed' => true],
            ['id' => 3, 'text' => 'Добавить Alpine.js', 'completed' => true],
            ['id' => 4, 'text' => 'Создать Livewire компоненты', 'completed' => false],
        ];
    }

    public function addTask()
    {
        if (trim($this->newTask) !== '') {
            $this->tasks[] = [
                'id' => count($this->tasks) + 1,
                'text' => $this->newTask,
                'completed' => false
            ];
            $this->newTask = '';
        }
    }

    public function toggleTask($taskId)
    {
        foreach ($this->tasks as &$task) {
            if ($task['id'] == $taskId) {
                $task['completed'] = !$task['completed'];
                break;
            }
        }
    }

    public function deleteTask($taskId)
    {
        $this->tasks = array_filter($this->tasks, function($task) use ($taskId) {
            return $task['id'] != $taskId;
        });
    }

    public function render()
    {
        return view('livewire.task-manager');
    }
}