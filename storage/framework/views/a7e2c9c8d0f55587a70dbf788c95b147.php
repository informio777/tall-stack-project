<?php if (isset($component)) { $__componentOriginal4619374cef299e94fd7263111d0abc69 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4619374cef299e94fd7263111d0abc69 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    <div class="text-center">
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">
                            Добро пожаловать в TALL Stack Project
                        </h1>
                        <p class="text-lg text-gray-600 mb-8">
                            Современный веб-проект на базе Tailwind CSS, Alpine.js, Laravel и Livewire
                        </p>
                        
                        <!-- Interactive Counter with Alpine.js -->
                        <div x-data="{ count: 0 }" class="bg-gray-50 p-6 rounded-lg mb-8">
                            <h3 class="text-xl font-semibold mb-4">Alpine.js Counter</h3>
                            <div class="text-3xl font-bold text-blue-600 mb-4" x-text="count"></div>
                            <div class="space-x-4">
                                <button @click="count++" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Увеличить
                                </button>
                                <button @click="count--" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Уменьшить
                                </button>
                                <button @click="count = 0" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Сбросить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Task Manager with Alpine.js -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Менеджер задач (Alpine.js)</h2>
                    <div x-data="{
                        tasks: [
                            { id: 1, text: 'Изучить Laravel', completed: true },
                            { id: 2, text: 'Настроить Tailwind CSS', completed: true },
                            { id: 3, text: 'Добавить Alpine.js', completed: true },
                            { id: 4, text: 'Создать интерактивные компоненты', completed: false }
                        ],
                        newTask: '',
                        addTask() {
                            if (this.newTask.trim()) {
                                this.tasks.push({
                                    id: Date.now(),
                                    text: this.newTask,
                                    completed: false
                                });
                                this.newTask = '';
                            }
                        },
                        toggleTask(id) {
                            const task = this.tasks.find(t => t.id === id);
                            if (task) task.completed = !task.completed;
                        },
                        deleteTask(id) {
                            this.tasks = this.tasks.filter(t => t.id !== id);
                        },
                        get completedCount() {
                            return this.tasks.filter(t => t.completed).length;
                        },
                        get remainingCount() {
                            return this.tasks.filter(t => !t.completed).length;
                        }
                    }" class="max-w-md mx-auto">
                        <!-- Add Task Form -->
                        <div class="mb-4">
                            <div class="flex">
                                <input 
                                    type="text" 
                                    x-model="newTask"
                                    @keydown.enter="addTask()"
                                    placeholder="Добавить новую задачу..."
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                                <button 
                                    @click="addTask()"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r-md"
                                >
                                    Добавить
                                </button>
                            </div>
                        </div>

                        <!-- Tasks List -->
                        <div class="space-y-2">
                            <template x-for="task in tasks" :key="task.id">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <input 
                                            type="checkbox" 
                                            :checked="task.completed"
                                            @click="toggleTask(task.id)"
                                            class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500"
                                        >
                                        <span :class="task.completed ? 'line-through text-gray-500' : 'text-gray-900'" x-text="task.text"></span>
                                    </div>
                                    <button 
                                        @click="deleteTask(task.id)"
                                        class="text-red-500 hover:text-red-700 text-sm"
                                    >
                                        Удалить
                                    </button>
                                </div>
                            </template>
                        </div>

                        <!-- Statistics -->
                        <div class="mt-4 text-sm text-gray-600">
                            <p>Всего задач: <span x-text="tasks.length"></span></p>
                            <p>Выполнено: <span x-text="completedCount"></span></p>
                            <p>Осталось: <span x-text="remainingCount"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-center">
                        <div class="text-blue-500 text-4xl mb-4">🎨</div>
                        <h3 class="text-lg font-semibold mb-2">Tailwind CSS</h3>
                        <p class="text-gray-600">Утилиты для создания современного дизайна</p>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-center">
                        <div class="text-green-500 text-4xl mb-4">⚡</div>
                        <h3 class="text-lg font-semibold mb-2">Alpine.js</h3>
                        <p class="text-gray-600">Легкий JavaScript фреймворк</p>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-center">
                        <div class="text-red-500 text-4xl mb-4">🚀</div>
                        <h3 class="text-lg font-semibold mb-2">Laravel</h3>
                        <p class="text-gray-600">Элегантный PHP фреймворк</p>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-center">
                        <div class="text-purple-500 text-4xl mb-4">🔥</div>
                        <h3 class="text-lg font-semibold mb-2">Livewire</h3>
                        <p class="text-gray-600">Динамические компоненты без JavaScript</p>
                    </div>
                </div>
            </div>

            <!-- Interactive Form with Alpine.js -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Интерактивная форма</h2>
                    <div x-data="{ 
                        name: '', 
                        email: '', 
                        message: '',
                        showAlert: false,
                        submitForm() {
                            if (this.name && this.email && this.message) {
                                this.showAlert = true;
                                setTimeout(() => { this.showAlert = false; }, 3000);
                                this.name = '';
                                this.email = '';
                                this.message = '';
                            }
                        }
                    }">
                        <div x-show="showAlert" x-transition class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            Сообщение отправлено успешно!
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Имя</label>
                                <input type="text" x-model="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Введите ваше имя">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" x-model="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Введите ваш email">
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Сообщение</label>
                            <textarea x-model="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Введите ваше сообщение"></textarea>
                        </div>
                        
                        <div class="mt-6">
                            <button @click="submitForm()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Отправить сообщение
                            </button>
                        </div>
                        
                        <div class="mt-4 text-sm text-gray-600">
                            <p>Имя: <span x-text="name || 'Не указано'"></span></p>
                            <p>Email: <span x-text="email || 'Не указано'"></span></p>
                            <p>Длина сообщения: <span x-text="message.length"></span> символов</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4619374cef299e94fd7263111d0abc69)): ?>
<?php $attributes = $__attributesOriginal4619374cef299e94fd7263111d0abc69; ?>
<?php unset($__attributesOriginal4619374cef299e94fd7263111d0abc69); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4619374cef299e94fd7263111d0abc69)): ?>
<?php $component = $__componentOriginal4619374cef299e94fd7263111d0abc69; ?>
<?php unset($__componentOriginal4619374cef299e94fd7263111d0abc69); ?>
<?php endif; ?><?php /**PATH /home/runner/work/tall-stack-project/tall-stack-project/resources/views/welcome.blade.php ENDPATH**/ ?>