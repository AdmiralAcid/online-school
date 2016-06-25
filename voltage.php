<?php
	//Start the session
	require_once('session.php');

	function chankStatusDefiner($student_id, $chunk_id, $dbc) {
		$query = "SELECT chunk_status FROM chunk_progress WHERE chunk_id = '$chunk_id' AND " . 
			"student_id = '$student_id'";
		$data = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($data);
		if ($row['chunk_status'] == 'n') {
			return "new_chunk";
		} 
		elseif ($row['chunk_status'] == 'e') {
			return "ended_chunk";
		} 
	}
	
	//Check if user is not logged in
	if (!isset($_SESSION['username']) || !isset($_SESSION['first_name']) || 
		!isset($_SESSION['second_name']) || !isset($_SESSION['is_student'])) {
		header("Location: index.php");
	}
	else {
		//if user is logged in, but he is not student
		if ($_SESSION['is_student'] == 0) {
			header("Location: index.php");
		}
		else {
			//setting variables for header.php
			$page_title = 'Закон Ома. Напряжение';
			$page_css = 'study.css';
			$page_js = 'voltage.js';
			require_once('header.php');

			$dbc = mysqli_connect('localhost', 'headfirst', 'headfirst', 'temp_learning') 
				or die('error connecting with database :(');
			mysqli_query($dbc, "SET NAMES 'utf8'");

			//getting student id
			$query = "SELECT students.id FROM students, users WHERE users.login_mail = '" . $_SESSION['username'] . "' AND students.user_id = users.id";
			$data = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($data);
			$student_id = $row['id'];

?>
		<p id="p-title"><span>Закон Ома.</span>Напряжение</p>
		<div id="bicolor-background">
			<div id="work-space">
				<div id="status-panel">
					<p id="status-panel-para">5. Закон Ома</p>
					<div class="greyline"></div>
					<ul id="status-panel-list">
						<li><a href="#" class="current_chunk">5.1 Напряжение</a></li>
<?php 
				echo "\t\t\t\t\t\t<li><a class=\"" . chankStatusDefiner($student_id, 2, $dbc) . 
					"\" href=\"intensity.php\">5.2 Сила тока</a></li>";
				echo "\t\t\t\t\t\t<li><a class=\"" . chankStatusDefiner($student_id, 3, $dbc) . 
					"\" href=\"resistance.php\">5.3 Сопротивление</a></li>";
				echo "\t\t\t\t\t\t<li><a class=\"" . chankStatusDefiner($student_id, 4, $dbc) . 
					"\" href=\"ohm.php\">5.4 Закон Ома</a></li>";
				echo "\t\t\t\t\t\t<li><a class=\"" . chankStatusDefiner($student_id, 5, $dbc) . 
					"\" href=\"ohm_math.php\">5.5 Формулы</a></li>";
?>
					</ul>
					<div class="greyline"></div>
					<div id="status-panel-changer">
						<div class="narration-button" id="text-button"></div>
						<div class="narration-button" id="video-button"></div>
						<div class="narration-button" id="audio-button"></div>
					</div>
					<div class="greyline"></div>
					<div id="getback">
						<a href="index.php"><<Вернуться к выбору урока</a>
					</div>
				</div>
				<div id="study-panel">
					<div id="white-wrapper">
						<div id="voltage_text" class="usual">
							<div id="voltage-side-panel"></div>
							<div id="voltage-content">
								<p>
									Как нам уже стало известно из предыдущих глав, электрический ток - это 
									упорядоченное движение заряженных частиц, которое создается электрическим 
									полем, а оно при этом совершает работу. Работа поля заключается в перемещении 
									заряженных частиц по проводнику и называется работой тока. В процессе такой 
									работы энергия электрического поля превращается в другой вид энергии − 
									механическую, внутреннюю и др. 
								</p>
								<div class="voltage-inner-img">
									<img src="images/charge.jpg">
								</div>
								<p>
									Работа тока зависит от нескольких параметров. Вполне логично предположить, 
									что работа тока непосредственно связана с силой тока или, в нашем случае, 
									от величины электрического заряда, протекшего по проводнику. Однако, помимо 
									силы тока, работа тока связана еще с одной величиной, называемой электрическим 
									напряжением, или просто напряжением. Напряжение - физическая величина, 
									характеризующая электрическое поле. Оно обозначается латинской буквой U.
								</p>
								<p>
									Для лучшего понимания совершим небольшой опыт. Собираем две электрические 
									цепи, в одной из них лампочка от карманного фонаря, и источником тока 
									является батарейка, а в другом лампа накаливания и источником тока 
									является городская сеть. Амперметры, включенные в цепи, показывают 
									одинаковую силу тока для обеих цепей. Однако лампа, включенная в городскую 
									сеть излучает больше тепла и света, чем лампочка карманного фонарика. Такой 
									результат объясняется тем, что при одинаковой силе тока работа тока в этих 
									цепях различна. Напряжение, создаваемое аккумулятором, значительно меньше 
									напряжения городской сети.
								</p>
								<p>
									Напряжение показывает, какая работа совершается электрическим полем при 
									перемещении единичного положительного заряда из одной точки в другую.<br>
									Напряжение = работа тока / электрический заряд = A/q = U.
								</p>
								<p>
									Электрический ток подобен течению воды в реках или водопадах, т.е. течению 
									воды сверху вниз. Если провести аналогию, то электрический заряд подобен 
									массе воды, протекающей через сечение реки, а напряжение разности уровней, 
									напору воды в реке. Работа, совершаемая падающей с плотины водой, зависит 
									от массы воды и высоты падения. Так же и в электрической цепи - работа тока 
									зависит от электрического заряда, протекающего через сечение проводника, и 
									от напряжения на этом проводнике. 
								</p>
								<p>
									Единица измерения напряжения называется вольтом (В). Она так названа в честь 
									итальянского ученого Алессандро Вольта.
								</p>
								<div class="voltage-inner-img">
									[портрет Алессандро Вольта]
								</div>
								<p>
									За единицу напряжения принимают такое электрическое напряжение на концах 
									проводника, при котором работа по перемещению электрического заряда в 1 Кл 
									по этому проводнику равна 1 Дж.<br>
									1 В = 1 Дж / Кл<br>
									Кроме вольта применяют дольные и кратные единицы: милливольт (мВ) и 
									киловольт (кВ).<br>
									1 мВ = 0,001 В<br>
									1 кВ = 1000 В<br>
								</p>
							</div>
						</div>
						<div id="voltage_text_simple" class="simple"></div>
						<div id="voltage_video"></div>
						<div id="voltage_video_simple"></div>
						<div id="voltage_audio"></div>
						<div id="voltage_audio_simple"></div>
					</div>
				</div>
			</div>
		</div>
<?php

		}
	}


?>
	</div>
</body>
</html>