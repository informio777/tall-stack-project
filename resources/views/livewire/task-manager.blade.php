<div class="max-w-md mx-auto">
    <h3 class="text-lg font-semibold mb-4">Менеджер задач</h3>
    
    <!-- Add Task Form -->
    <div class="mb-4">
        <div class="flex">
            <input 
                type="text" 
                wire:model="newTask" 
                wire:keydown.enter="addTask"
                placeholder="Добавить новую задачу..."
                class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button 
                wire:click="addTask"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r-md"
            >
                Добавить
            </button>
        </div>
    </div>

    <!-- Tasks List -->
    <div class="space-y-2">
        @foreach($tasks as $task)
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="flex items-center space-x-3">
                    <input 
                        type="checkbox" 
                        wire:click="toggleTask({{ $task['id'] }})"
                        {{ $task['completed'] ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500"
                    >
                    <span class="{{ $task['completed'] ? 'line-through text-gray-500' : 'text-gray-900' }}">
                        {{ $task['text'] }}
                    </span>
                </div>
                <button 
                    wire:click="deleteTask({{ $task['id'] }})"
                    class="text-red-500 hover:text-red-700 text-sm"
                >
                    Удалить
                </button>
            </div>
        @endforeach
    </div>

    <!-- Statistics -->
    <div class="mt-4 text-sm text-gray-600">
        <p>Всего задач: {{ count($tasks) }}</p>
        <p>Выполнено: {{ count(array_filter($tasks, fn($task) => $task['completed'])) }}</p>
        <p>Осталось: {{ count(array_filter($tasks, fn($task) => !$task['completed'])) }}</p>
    </div>
</div>