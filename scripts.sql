CREATE TABLE users (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, login_mail VARCHAR(30) 
	NOT NULL, password VARCHAR(40) NOT NULL, is_student BOOL);

CREATE TABLE parents (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, user_id INT NOT NULL, 
	first_name VARCHAR(30) NOT NULL, second_name VARCHAR(30) NOT NULL, patronymic VARCHAR(20), 
	FOREIGN KEY(user_id) REFERENCES users(id));

CREATE TABLE students (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, user_id INT NOT NULL, 
	first_name VARCHAR(30) NOT NULL, second_name VARCHAR(30) NOT NULL, patronymic VARCHAR(20), 
	birth_date DATE NOT NULL, location VARCHAR(30) NOT NULL, school VARCHAR(30) NOT NULL, 
	photo VARCHAR(30) NOT NULL, parent_one INT, parent_two INT, FOREIGN KEY(user_id) 
	REFERENCES users(id));

CREATE TABLE subjects (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, subject_name VARCHAR(20) 
	NOT NULL)

CREATE TABLE themes (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, subject_id INT NOT NULL, 
	theme_name VARCHAR(30) NOT NULL, order_number INT NOT NULL, link VARCHAR(20));

CREATE TABLE theme_progress (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, student_id INT 
	NOT NULL, theme_id INT NOT NULL, theme_status VARCHAR(1));
#s - started   e - ended   n - new

CREATE TABLE chunks (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, theme_id INT NOT NULL, 
	chunk_name VARCHAR(40) NOT NULL, order_number INT NOT NULL, link VARCHAR(20));

CREATE TABLE chunk_progress (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, student_id INT 
	NOT NULL, chunk_id INT NOT NULL, chunk_status VARCHAR(1));
#s - started   e - ended   n - new

INSERT INTO chunks (theme_id, chunk_name, order_number, link) VALUES (20, 'voltage', 1, 'voltage');
INSERT INTO chunks (theme_id, chunk_name, order_number, link) VALUES (20, 'intensity', 2, 'intensity');
INSERT INTO chunks (theme_id, chunk_name, order_number, link) VALUES (20, 'resistance', 3, 'resistance');
INSERT INTO chunks (theme_id, chunk_name, order_number, link) VALUES (20, 'ohm_law', 4, 'ohm');
INSERT INTO chunks (theme_id, chunk_name, order_number, link) VALUES (20, 'ohm_law_math', 5, 'ohm_math');

INSERT INTO subjects (subject_name) VALUES ('Алгебра');
INSERT INTO subjects (subject_name) VALUES ('Геометрия');
INSERT INTO subjects (subject_name) VALUES ('Физика');
INSERT INTO subjects (subject_name) VALUES ('Химия');
INSERT INTO subjects (subject_name) VALUES ('Биология');

INSERT INTO theme_progress (student_id, theme_id, theme_status) VALUES (1, 16, 'e');
INSERT INTO theme_progress (student_id, theme_id, theme_status) VALUES (1, 17, 'e');
INSERT INTO theme_progress (student_id, theme_id, theme_status) VALUES (1, 18, 'e');
INSERT INTO theme_progress (student_id, theme_id, theme_status) VALUES (1, 19, 'e');
#INSERT INTO theme_progress (student_id, theme_id, theme_status) VALUES (1, 20, 's');
INSERT INTO theme_progress (student_id, theme_id, theme_status) VALUES (1, 21, 'n');
INSERT INTO theme_progress (student_id, theme_id, theme_status) VALUES (1, 22, 'n');
INSERT INTO theme_progress (student_id, theme_id, theme_status) VALUES (1, 23, 'n');

INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (1, 'Рациональные дроби', 1, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (1, 'Произведение и частное дробей', 2, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (1, 'Обратная пропорциональноcть', 3, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (1, 'Действительные числа', 4, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (1, 'Квадратный корень', 5, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (1, 'Квадратное уравнение', 6, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (1, 'Числовые неравенства', 7, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (2, 'Повороты', 1, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (2, 'Тригонометрические функции', 2, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (2, 'Вписанные и описанные фигуры', 3, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (2, 'Правильные многоугольники', 4, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (2, 'Круг и число п', 5, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (2, 'Тригонометрические функции', 6, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (2, 'Площадь поверхностей', 7, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (2, 'Объемы тел', 8, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (3, 'Электрический заряд', 1, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (3, 'Закон сохранения заряда', 2, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (3, 'Взаимодействие зарядов', 3, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (3, 'Электрическое поле', 4, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (3, 'Закон Ома', 5, 'om_rule');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (3, 'Последовательное соединение', 6, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (3, 'Параллельное соединение', 7, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (3, 'Работа и мощность тока', 8, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (4, 'Атомы и молекулы', 1, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (4, 'Понятие вещества', 2, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (4, 'Масса веществ', 3, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (4, 'Система химических элементов', 4, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (4, 'Валентность элементов', 5, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (5, 'Химические реакции', 6, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (4, 'Чистые вещества и смеси', 7, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (4, 'Газы', 8, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (5, 'Организм человека', 1, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (5, 'Опорно-двигательный аппарат', 2, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (5, 'Внутренняя среда организма', 3, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (5, 'Кровообращение', 4, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (5, 'Дыхание', 5, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (5, 'Питание', 6, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (5, 'Обмен веществ', 7, 'blank');
INSERT INTO themes (subject_id, theme_name, order_number, link) VALUES (5, 'Покровы тела человека', 8, 'blank');