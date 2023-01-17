// client-side js, loaded by index.html
// run by the browser each time the page is loaded

$(function(){

	$(document).on('focusout', '.question1', function(data, el){
		let answer1 = $("#questions-answer1").val();
		console.log(answer1);
		let add = true;
		$("#questions-success_answer > option").each(function() {

			if (answer1 == this.value){
				add = false;
			}
		});
		$('#questions-success_answer').find('option').remove().end();
		if(add && add != '') {
			console.log('add');
			$('#questions-success_answer').append('<option value="' + answer1 + '">' + answer1 + '</option>');
		}
		let answer2 = $("#questions-answer2").val();
		if(answer2 != '')	$('#questions-success_answer').append('<option value="' + answer2 + '">' + answer2 + '</option>');
		let answer3 = $("#questions-answer3").val();
		if(answer3 != '') $('#questions-success_answer').append('<option value="' + answer3 + '">' + answer3 + '</option>');
		let answer4 = $("#questions-answer4").val();
		if(answer4 != '') $('#questions-success_answer').append('<option value="' + answer4 + '">' + answer4 + '</option>');
		let answer5 = $("#questions-answer5").val();
		if(answer5 != '') $('#questions-success_answer').append('<option value="' + answer5 + '">' + answer5 + '</option>');
	});
	$(document).on('focusout', '.question2', function(data, el){
		let answer2 = $("#questions-answer2").val();
		let add = true;
		$("#questions-success_answer > option").each(function() {

			if (answer2 == this.value){
				add = false;
			}
		});

		$('#questions-success_answer').find('option').remove().end();
		if(add && add != '')	$('#questions-success_answer').append('<option value="' + answer2 + '">' + answer2 + '</option>');

		let answer1 = $("#questions-answer1").val();
		if(answer1 != '') $('#questions-success_answer').append('<option value="' + answer1 + '">' + answer1 + '</option>');
		let answer3 = $("#questions-answer3").val();
		if(answer3 != '') $('#questions-success_answer').append('<option value="' + answer3 + '">' + answer3 + '</option>');
		let answer4 = $("#questions-answer4").val();
		if(answer4 != '') $('#questions-success_answer').append('<option value="' + answer4 + '">' + answer4 + '</option>');
		let answer5 = $("#questions-answer5").val();
		if(answer5 != '') $('#questions-success_answer').append('<option value="' + answer5 + '">' + answer5 + '</option>');

	});
	$(document).on('focusout', '.question3', function(data, el){
		let answer3 = $("#questions-answer3").val();
		let add = true;
		$("#questions-success_answer > option").each(function() {

			if (answer3 == this.value){
				add = false;
			}
		});
		$('#questions-success_answer').find('option').remove().end();
		if(add && add != '')	$('#questions-success_answer').append('<option value="' + answer3 + '">' + answer3 + '</option>');

		let answer2 = $("#questions-answer2").val();
		if(answer2 != '') $('#questions-success_answer').append('<option value="' + answer2 + '">' + answer2 + '</option>');
		let answer1 = $("#questions-answer1").val();
		if(answer1 != '') $('#questions-success_answer').append('<option value="' + answer1 + '">' + answer1 + '</option>');
		let answer4 = $("#questions-answer4").val();
		if(answer4 != '') $('#questions-success_answer').append('<option value="' + answer4 + '">' + answer4 + '</option>');
		let answer5 = $("#questions-answer5").val();
		if(answer5 != '') $('#questions-success_answer').append('<option value="' + answer5 + '">' + answer5 + '</option>');
	});
	$(document).on('focusout', '.question4', function(data, el){
		let answer4 = $("#questions-answer4").val();
		let add = true;
		$("#questions-success_answer > option").each(function() {

			if (answer4 == this.value){
				add = false;
			}
		});
		$('#questions-success_answer').find('option').remove().end();
		if(add && add != '')	$('#questions-success_answer').append('<option value="' + answer4 + '">' + answer4 + '</option>');
		let answer2 = $("#questions-answer2").val();
		if(answer2 != '')$('#questions-success_answer').append('<option value="' + answer2 + '">' + answer2 + '</option>');
		let answer3 = $("#questions-answer3").val();
		if(answer3 != '')$('#questions-success_answer').append('<option value="' + answer3 + '">' + answer3 + '</option>');
		let answer1 = $("#questions-answer1").val();
		if(answer1 != '')$('#questions-success_answer').append('<option value="' + answer1 + '">' + answer1 + '</option>');
		let answer5 = $("#questions-answer5").val();
		if(answer5 != '')$('#questions-success_answer').append('<option value="' + answer5 + '">' + answer5 + '</option>');

	});
	$(document).on('focusout', '.question5', function(data, el){
		let answer5 = $("#questions-answer5").val();
		let add = true;
		$("#questions-success_answer > option").each(function() {

			if (answer5 == this.value){
				add = false;
			}
		});
		$('#questions-success_answer').find('option').remove().end();

		if(add && add != '')	$('#questions-success_answer').append('<option value="' + answer5 + '">' + answer5 + '</option>');
		let answer2 = $("#questions-answer2").val();
		if(answer2 != '') $('#questions-success_answer').append('<option value="' + answer2 + '">' + answer2 + '</option>');
		let answer3 = $("#questions-answer3").val();
		if(answer3 != '') $('#questions-success_answer').append('<option value="' + answer3 + '">' + answer3 + '</option>');
		let answer1 = $("#questions-answer1").val();
		if(answer1 != '') $('#questions-success_answer').append('<option value="' + answer1 + '">' + answer1 + '</option>');
		let answer4 = $("#questions-answer4").val();
		if(answer4 != '') $('#questions-success_answer').append('<option value="' + answer4 + '">' + answer4 + '</option>');

	});
	$(document).on('click', '.position_add', function(){

		let name = $(".position_value").val();
		$.ajax({
			url: '/api/web/v1/user/position',
			type: "POST",
			async : false,
			data:{name:name},
			success: function(result){
				console.log(result);
				$('#userprofile-position').append('<option value="' + result.id + '">' + result.name + '</option>');


				$('#userprofile-position option[value="'+ result.id +'"]').prop('selected', true);


				$('#modal_add_position').modal('hide');

			}
		});

	});



	$(document).on('click', '.company', function(){

		let id = $(this).data('id');

		$.ajax({
			url: '/api/web/v1/user/set-company',
			type: "POST",
			async : false,
			data:{id:id},
			success: function(result){
				$("#currentCompany").text(result);

				window.location.href = "/backend/web/";
				console.log('set-company ',result);
			}
		});

	});

	$(document).on('click', '#userprofile-is_disease', function(){

		if($(this).attr("checked") != 'checked') {
			$('#modal_confirm').modal('show');
		}





	});


	$(document).on('click', '.btn_ok', function(data, el){
		console.log('ok');
		$("#userprofile-is_disease").prop( "checked", true );
		$('#modal_confirm').modal('hide');
	});


	$(document).on('click', '.btn_no', function(data, el){
		console.log('no');
		$("#userprofile-is_disease").prop( "checked", false );
		$('#modal_confirm').modal('hide');
	});

});


					let Peer = window.Peer;

					let messagesEl = document.querySelector('.messages');
					let peerIdEl = document.querySelector('#connect-to-peer');
					let videoEl = document.querySelector('.remote-video');

					let logMessage = (message) => {
						let newMessage = document.createElement('div');
						newMessage.innerText = message;
						messagesEl.appendChild(newMessage);
					};

					let renderVideo = (stream) => {
						console.log('stream', stream);
						videoEl.srcObject = stream;
					};

					// Register with the peer server
					// let peer = new Peer(null, {debug: 2});
						const customGenerationFunction = () => (Math.random().toString(36) + '0000000000000000000').substr(2, 16);
						const peer = new Peer( {
							host: '89.223.94.224',
							port: '9099',
							path: '/med',
							generateClientId:customGenerationFunction
						});

					peer.on('open', (id) => {
						 logMessage('My peer ID is: ' + id);
					});
					peer.on('error', (error) => {
						console.error(error);
					});

					// Handle incoming data connection
					peer.on('connection', (conn) => {
						logMessage('incoming peer connection!');
						conn.on('data', (data) => {
							logMessage(`received: ${data}`);
						});
						conn.on('open', () => {
							conn.send('hello!');
						});
					});

					// Handle incoming voice/video connection
					peer.on('call', (call) => {
						window.navigator.mediaDevices.getUserMedia({  audio: true})
							.then((stream) => {
								window.stream = stream;
								call.answer(stream); // Answer the call with an A/V stream.
								call.on('stream', renderVideo);
							})
							.catch((err) => {
								console.error('Handle incoming voice/video Failed to get local stream', err);
							});
					});

					// Initiate outgoing connection
				  	let connectToPeer = () => {
						let peerId = peerIdEl.value;
						logMessage(`Connecting to ${peerId}...`);

						// let conference =   update(peerId);
							let conference = '';
							$.ajax({
								url: '/api/web/v1/user/start-conf?peer='+peerId,
								type: "POST",
								async : false,
								success: function(result){
									console.log(result);
									conference = result;
									return  result;
								}
							});

						console.log('conference',conference);

						let conn = peer.connect(peerId);
						conn.on('data', (data) => {
							logMessage(data);
						});
						conn.on('open', () => {

							conn.send({text: 'start', conference:conference});
							$("#btns").show();
							$("#comments").show();

						});

						console.log(window.navigator.mediaDevices);
						if(window.navigator.mediaDevices != undefined){
							window.navigator.mediaDevices.getUserMedia({video: true, audio: true})
								.then((stream) => {
									console.log('Initiate outgoing stream', stream);
									window.stream = stream;
									let call = peer.call(peerId, stream);
									call.on('stream', renderVideo);
								})
								.catch((err) => {
									logMessage(' Initiate outgoing connection Failed to get local stream', err);
								});
						}else{
							logMessage(' mediaDevices undefined');
						}

					};

					window.connectToPeer = connectToPeer;


				let successPeer = () => {
					let peerId = peerIdEl.value;
					let conn = peer.connect(peerId);
					conn.on('open', () => {
						let comment = document.getElementById("comment").value;

						if (!comment)return false;

						conn.send({text: 'stop_ok', comment: comment});

						 const stream = window.stream;

						try {
							stream.getVideoTracks()[0].stop();
							stream.getAudioTracks()[0].stop();
							stopMediaStream(stream)
						}
						catch (e) {
							console.log(e)
						}


						videoEl.srcObject = null;


						let id = $("#comment").data('id');
						let report = $("#report").val();
						console.log(report);
						$.ajax({
							type: "POST",
							url: '/api/web/v1/user/report-update-comment',
							data:{
								id: id,
								comment: comment,
								status: 3,
								report: report
							},
							dataType: "json",
							success: function(result){
								 console.log(result);
								window.location.replace("http://89.223.94.224:8010/backend/web/conference");
								document.location.href='http://89.223.94.224:8010/backend/web/conference'
							}
						})
					});
				};

				window.successPeer = successPeer;





			let dangerPeer = () => {
				let peerId = peerIdEl.value;
				let conn = peer.connect(peerId);
				conn.on('open', () => {
					let comment = document.getElementById("comment").value;
					if (!comment)return false;
					conn.send({text: 'stop_no', comment: comment});
					const stream = window.stream;
					try {
						stream.getVideoTracks()[0].stop();
						stream.getAudioTracks()[0].stop();
						stopMediaStream(stream)
					}
					catch (e) {
						console.log(e)
					}

					videoEl.srcObject = null;
					let report = $("#report").val();
					let id = $("#comment").data('id');
					console.log(report);
					$.ajax({
						type: "POST",
						url: '/api/web/v1/user/report-update-comment',
						data:{
							id: id,
							comment: comment,
							status: 4,
							report: report
						},
						dataType: "json",
						success: function(result){
							console.log(result);
							window.location.replace("http://89.223.94.224:8010/backend/web/conference");
							document.location.href='http://89.223.94.224:8010/backend/web/conference'
						}
					})


				});
			};

			window.dangerPeer = dangerPeer;



		function stopAndRemoveTrack(mediaStream) {
			return function(track) {
				track.stop();
				mediaStream.removeTrack(track);
			};
		};

		function stopMediaStream(mediaStream) {
			if (!mediaStream) {
				return;
			}

			mediaStream.getTracks().forEach(stopAndRemoveTrack(mediaStream));
		};




 function update(peer){
	$.ajax({
		url: '/api/web/v1/user/start-conf?peer='+peer,
		type: "POST",
		async : false,
		success: function(result){
 				console.log(result);
 				return  result;
		}
	})
}