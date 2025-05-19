const music = new Audio('');

//songs library
const songData = [
    ["On My Way", "Alan Walker"],
    ["Believer", "Imagine"],
    ["Millionaire", "Honey Singh"],
    ["Heart Over Mind", "Alan Walker"],
    ["Dil Tu Jaan Tu", "..."],
    ["On-My-Way", "Alan Walker"],
    ["Time Traveller", "..."],
    ["Yesterday", "..."],
    ["Moscow Suka", "Honey Singh"],
    ["Percent", "Garry Sandhu"],
    ["Slow life", "Benjamin"],
    ["Jatt Mehkma", "Honey Singh"],
    ["4x4", "Balkar Ankhila"],
    ["Aaj Ki Raat(", "TAMANNA"],
    ["Chhoolu Chhoolu", "Anirban Roy"],
    ["Ilzaam", "Vishal Mishra"],
    ["Khudaya Ishq", "Arjit Singh"],
    ["You And Me Not Same", "Lipsika Bhashyam"]
];

const songs = songData.map((item, index) => ({
    id: (index + 1).toString(),
    songname: `${item[0]} <br><div class="subtitle">${item[1]}</div>`,
    poster: `Images/${index + 1}.jpg`
}));


// Update song items with poster images & Name
const songItems = Array.from(document.getElementsByClassName('songitem'));
songItems.forEach((e, i) => {
    if (songs[i]) {
        e.getElementsByTagName('img')[0].src = songs[i].poster;
        e.getElementsByTagName('h5')[0].innerHTML = songs[i].songname;
    }
});

// Get the container where search results will be displayed
let search_result = document.getElementsByClassName('search_result')[0];

songs.forEach(elem => {
    const {id,songname,poster} = elem; // Destructure song properties
    //console.log(id);
    let card = document.createElement('a');
    card.classList.add('card');
    card.href ="#" + id;
    card.innerHTML = `
    <img src="${poster}"alt="">
                                <div class="content">
                                    ${songname}
                                </div>`
    search_result.appendChild(card);
});

let input = document.getElementsByTagName('input')[0];
input.addEventListener('keyup', () => {
    let input_value = input.value.toUpperCase();  // Get the input value and convert to uppercase
    let items = search_result.getElementsByTagName('a');  // Get all the search result items (cards)

    for (let index = 0; index < items.length; index++) {
        let aj = items[index].getElementsByClassName('content')[0];  // Get the content of each card
        let text_value = aj.textContent || aj.innerHTML;  // Get the text of the content

        // Check if the text matches the input value
        if (text_value.toUpperCase().indexOf(input_value) > -1) {
            items[index].style.display = "flex";  // Show the card
        } else {
            items[index].style.display = "none";  // Hide the card
        }
        //to hide search display
        if(input.value == 0){
         search_result.style.display = "none";   
        }
        else
        {
            search_result.style.display = ""; 
        }
    }
});


//Play & Pause music in master play section
let masterPlay = document.getElementById('masterPlay');
let wave = document.getElementById('wave');
let title = document.getElementById('title');
{
    masterPlay.addEventListener('click', ()=>{
       if(music.paused || music.currentTime <= 0) {
            music.play();
            wave.classList.add('active1');
            masterPlay.classList.remove('bi-play-fill');
            masterPlay.classList.add('bi-pause-fill');
       }
       else {
        music.pause();
        wave.classList.remove('active1');
        masterPlay.classList.add('bi-play-fill');
            masterPlay.classList.remove('bi-pause-fill');
    }
    })
}

//Poster and song name updation in master play section
let index = 0;
let poster_master_play = document.getElementById('poster_master_play');
Array.from(document.getElementsByClassName('playListPlay')).forEach((e) => {
    e.addEventListener('click', (el) => {
        index = el.target.id; // Get the clicked element's ID
        //console.log(index);
        music.src = `Audio/${index}.mp3`;
        poster_master_play.src =`Images//${index}.jpg`;
        music.play(); // Play the audio
        masterPlay.classList.remove('bi-play-fill');
        masterPlay.classList.add('bi-pause-fill');
        
        let songtitles = songs.filter((els) =>{
            return els.id == index;
        });
        songtitles.forEach(elss => {
            let {songname} = elss;
            title.innerHTML = songname;
        })  
    })
})

//Seek bar enable in master play section
let current_time = document.getElementById('current_time');
let end_time = document.getElementById('end_time');
let seek = document.getElementById('seek');
let bar2 = document.getElementById('bar2');
let dot = document.getElementsByClassName('dot')[0];
music.addEventListener('timeupdate', () => {
    // Get the current playback time
    let music_curr = music.currentTime;

    // Calculate minutes and seconds for current time
    let min1 = Math.floor(music_curr / 60);
    let sec1 = Math.floor(music_curr % 60);

    if (sec1 < 10) {
        sec1 = `0${sec1}`;
    }
    if (min1 < 10) {
        min1 = `0${min1}`;
    }

    // Update the current time in the DOM
    current_time.innerText = `${min1}:${sec1}`;

    // Get the total duration of the audio
    let music_dur = music.duration;

    if (!isNaN(music_dur)) { // Ensure duration is valid
        let min2 = Math.floor(music_dur / 60);
        let sec2 = Math.floor(music_dur % 60);

        if (sec2 < 10) {
            sec2 = `0${sec2}`;
        }
        if (min2 < 10) {
            min2 = `0${min2}`;
        }

        // Update the end time in the DOM
        end_time.innerText = `${min2}:${sec2}`;
    }

    let progressbar = parseInt((music_curr / music_dur) * 100); 
    seek.value = progressbar;
    let seekbar = seek.value;
    bar2.style.width = `${seekbar}%`;
    dot.style.left = `${seekbar}%`;
});

seek.addEventListener('input', () => {
    // Calculate the new time based on the seek bar value
    let seekValue = seek.value;
    music.currentTime = (seekValue / 100) * music.duration;
});

//Volume control in master play section
let vol_icon = document.getElementById('vol_icon');
let vol = document.getElementById('vol');
let vol_bar = document.getElementsByClassName('vol_bar')[0];
let vol_dot = document.getElementById('vol_dot');

vol.addEventListener('change', ()=>{
    if (vol.value == 0) {
        vol_icon.classList.remove('bi-volume-up');
        vol_icon.classList.remove('bi-volume-off-fill');
        vol_icon.classList.add('bi-volume-mute');
    }
    if(vol.value >0){
        vol_icon.classList.remove('bi-volume-up');
        vol_icon.classList.add('bi-volume-off-fill');
        vol_icon.classList.remove('bi-volume-mute');
    }
    if(vol.value >50){
        vol_icon.classList.add('bi-volume-up');
        vol_icon.classList.remove('bi-volume-off-fill');
        vol_icon.classList.remove('bi-volume-mute');
    }
    let vol_a = vol.value;
    vol_bar.style.width = `${vol_a}%`;
    vol_dot.style.left = `${vol_a}%`;
    music.volume = vol_a / 100;
});

let back = document.getElementById('back');
let next = document.getElementById('next');

back.addEventListener('click', () => {
    if (index > 1) { // Prevent index from going below 1
        index -= 1; // Decrement index
        console.log(index);
        music.src = `Audio/${index}.mp3`;
        poster_master_play.src = `Images/${index}.jpg`;
        music.play(); // Play the audio

        // Update song title
        const currentSong = songs.find(song => song.id == index); // Find song by id
        if (currentSong) {
            title.innerHTML = currentSong.songname; // Update the title
        }
    } else {
        console.log('This is the first song. Cannot go back further.');
    }
});

next.addEventListener('click', () => {
    if (index < songs.length) {
        index ++; // Increment the index
        console.log(index)
        music.src = `Audio/${index}.mp3`;
        poster_master_play.src = `Images/${index}.jpg`;
        music.play(); // Play the audio

        // Update song title
        const currentSong = songs.find(song => song.id == index); // Find song by id
        if (currentSong) {
            title.innerHTML = currentSong.songname; // Update the title
        }
    } else {
        console.log('This is the first song. Cannot go back further.');
}});

//Enable Arrows
let pop_song_left = document.getElementById('pop_song_left');
let pop_song_right = document.getElementById('pop_song_right'); 
let pop_song = document.getElementsByClassName('pop_song')[0];

let pop_art_left = document.getElementById('pop_art_left');
let pop_art_right = document.getElementById('pop_art_right'); 
let item = document.getElementsByClassName('item')[0];

// Scroll actions for pop songs and pop art sections
pop_song_right.addEventListener('click', () => {
    pop_song.scrollLeft += pop_song.offsetWidth; // Dynamically adjust scroll amount
});
pop_song_left.addEventListener('click', () => {
    pop_song.scrollLeft -= pop_song.offsetWidth;
});

pop_art_right.addEventListener('click', () => {
    item.scrollLeft += item.offsetWidth; // Dynamically adjust scroll amount
});
pop_art_left.addEventListener('click', () => {
    item.scrollLeft -= item.offsetWidth;
});