import tkinter as tk
from tkinter import filedialog


def generate():
    num_variants = variants_spinbox.get()
    print("Файлы сгенерированы для", num_variants, "вариантов")
    for i, task in enumerate(task_list):
        selected_subtasks = []
        for j, var in enumerate(task["vars"]):
            if var.get():
                selected_subtasks.append(task["subtasks"][j])
        print("Задание", i+1, "- выбранные подзадания:", selected_subtasks)


def select_folder():
    folder_path = filedialog.askdirectory()
    print("Выбрана папка:", folder_path)


root = tk.Tk()
root.title("Генератор заданий")
root.geometry("600x400")

# Количество вариантов
variants_label = tk.Label(root, text="Количество вариантов:")
variants_label.pack()

variants_spinbox = tk.Spinbox(root, from_=1, to=10)
variants_spinbox.pack()

# Список заданий
task_list = [
    {
        "name": "Теория",
        "subtasks": ["1", "2", "3", "4", "5"],
        "vars": []
    },
    {
        "name": "1. Определение вероятности",
        "subtasks": ["2", "4"],
        "vars": []
    },
    {
        "name": "2. Теоремы сложения и умножения вероятностей",
        "subtasks": ["6", "8"],
        "vars": []
    },
    {
        "name": "3. Полная вероятность. Формула Байеса",
        "subtasks": ["10"],
        "vars": []
    },
    {
        "name": "4. Законы распределения вероятностей дискретных случайных величин",
        "subtasks": ["12", "14"],
        "vars": []
    },
    {
        "name": "5. Законы распределения вероятностей непрерывных случайных величин",
        "subtasks": ["16", "18", "20"],
        "vars": []
    },
    {
        "name": "6. Числовые характеристики случайных величин",
        "subtasks": ["22", "24"],
        "vars": []
    }
]

for task in task_list:
    task_name_label = tk.Label(root, text=task["name"])
    task_name_label.pack()

    subtasks_frame = tk.Frame(root)
    subtasks_frame.pack(anchor="w", padx=20)

    vars_list = []
    for subtask in task["subtasks"]:
        var = tk.BooleanVar()
        vars_list.append(var)

        subtask_checkbox = tk.Checkbutton(subtasks_frame, text=subtask, variable=var)
        subtask_checkbox.pack(side="left", padx=5, pady=5)

    task["vars"] = vars_list

# Кнопка выбора папки
folder_button = tk.Button(root, text="Куда сохранять", command=select_folder)
folder_button.pack()

# Кнопка генерации
generate_button = tk.Button(root, text="Генерировать", command=generate)
generate_button.pack(pady=10)

root.mainloop()
