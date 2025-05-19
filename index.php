<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Music Website</title>
</head>
<body>
    <header>    
        <div class = "menu_side">
            <h1>Playlist</h1>
            <div class = "playlist">
                <h4 class="active"><span></span><i class="bi bi-music-note"></i>Playlist</h4>
                <h4><span></span><i class="bi bi-music-note"></i>Last Listening</h4>
                <h4><span></span><i class="bi bi-music-note"></i>Recommended</h4>
            </div>
            <div class="menu_song">
                <li class="songitem">
                    <span>01</span>
                    <img src="Images/1.jpg"alt="#NA">
                    <h5>On My Way <br>
                        <div class="subtitle">Alan Walker</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle-fill" id="1"></i>
                </li>
                <li class="songitem">
                    <span>02</span>
                    <img src="Images/2.jpg"alt="#NA">
                    <h5>Believer <br>
                        <div class="subtitle">Imagine</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle-fill" id="2"></i>
                </li>
                <li class="songitem">
                    <span>03</span>
                    <img src="Images/3.jpg"alt="#NA">
                    <h5>Millionaire <br>
                        <div class="subtitle">Honey Singh</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle-fill" id="3"></i>
                </li><li class="songitem">
                    <span>04</span>
                    <img src="Images/4.jpg"alt="#NA">
                    <h5>Heart Over Mind <br>
                        <div class="subtitle">Alan Walker</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle-fill" id="4"></i>
                </li><li class="songitem">
                    <span>05</span>
                    <img src="Images/5.jpg"alt="#NA">
                    <h5>Dil Tu Jaan Tu <br>
                        <div class="subtitle">....</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle-fill" id="5"></i>
                </li><li class="songitem">
                    <span>06</span>
                    <img src="Images/tengyart-YJfba56HBW4-unsplash.jpg"alt="#NA">
                    <h5>On-My-Way <br>
                        <div class="subtitle">Alan Walker</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle-fill" id="6"></i>
                </li><li class="songitem">
                    <span>07</span>
                    <img src="Images/6.jpg"alt="#NA">
                    <h5>Time Traveller <br>
                        <div class="subtitle">.....</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle-fill" id="7"></i>
                </li><li class="songitem">
                    <span>08</span>
                    <img src="Images/7.jpg"alt="#NA">
                    <h5>Yesterday <br>
                        <div class="subtitle">.....</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle-fill" id="8"></i>
                </li><li class="songitem">
                    <span>09</span>
                    <img src="Images/9.jpg"alt="#NA">
                    <h5>Moscow Suka <br>
                        <div class="subtitle">Honey Singh</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle-fill" id="9"></i>
                </li>
            </div>
        </div>
        <div class = "song_side">
                <nav>
                    <ul>
                        <li>Home<span></span></li>
                        <li><a href="about.php" style="text-decoration: none; color: inherit;">About Us</a></li>   
                    </ul>
                    <div class="search">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Search Music">
                        <div class="search_result">
                            <!-- <a href=""class="card">
                                <img src="Images/1.jpg"alt="">
                                <div class="content">
                                    On My Way
                                    <div class="subtitle">Alan Walker</div>
                                </div>
                            </a> -->
                        </div>
                        </div>
                </nav>
                <div class="content">
                    <h1>Alan Walker - Heart Over Mind</h1>
                    <p>I should've locked the door
                        Pinned myself to the floor
                        Made someone cover my eyes
                        'Cause when the devil's on my left
                        Tellin' me to go ahead
                        You're right back in my mind
                        I'm a human tug of war
                        How do I cut the cord?
                        Feel like I'm stumbling blind
                        And with the angel on my right
                        Tellin' me to pick a side tonight
                        Too hard to fight
                        Heart over mind</p>
                    <div class="buttons">
                    <button>Play</button>
                    <button>Follow</button>
                    </div>
                </div>
                <div class="popular_songs">
                    <div class="h4">
                        <h4>Popular Songs</h4>
                        <div class="btn">
                            <i class="bi bi-arrow-left" id="pop_song_left"></i>
                            <i class="bi bi-arrow-right" id="pop_song_right"></i>
                        </div>
                    </div>
                    <div class="pop_song">
                        <li class="songitem">
                            <div class="img_play">
                                <img src="Images/10.jpg" alt="NA" class="src">
                                <i class="bi playListPlay bi-play-circle-fill" id="10"></i>
                            </div>
                            <h5>On My Way <br>
                                <div class="subtitle">Alan Walker</div>
                            </h5>
                        </li>
                        <li class="songitem">
                            <div class="img_play">
                                <img src="Images/11.jpg" alt="NA" class="src">
                                <i class="bi playListPlay bi-play-circle-fill" id="11"></i>
                            </div>
                            <h5>On My Way <br>
                                <div class="subtitle">Alan Walker</div>
                            </h5>
                        </li><li class="songitem">
                            <div class="img_play">
                                <img src="Images/12.jpg" alt="NA" class="src">
                                <i class="bi playListPlay bi-play-circle-fill" id="12"></i>
                            </div>
                            <h5>On My Way <br>
                                <div class="subtitle">Alan Walker</div>
                            </h5>
                        </li><li class="songitem">
                            <div class="img_play">
                                <img src="Images/13.jpg" alt="NA" class="src">
                                <i class="bi playListPlay bi-play-circle-fill" id="13"></i>
                            </div>
                            <h5>On My Way <br>
                                <div class="subtitle">Alan Walker</div>
                            </h5>
                        </li><li class="songitem">
                            <div class="img_play">
                                <img src="Images/14.jpg" alt="NA" class="src">
                                <i class="bi playListPlay bi-play-circle-fill" id="14"></i>
                            </div>
                            <h5>On My Way <br>
                                <div class="subtitle">Alan Walker</div>
                            </h5>
                        </li><li class="songitem">
                            <div class="img_play">
                                <img src="Images/15.jpg" alt="NA" class="src">
                                <i class="bi playListPlay bi-play-circle-fill" id="15"></i>
                            </div>
                            <h5>On My Way <br>
                                <div class="subtitle">Alan Walker</div>
                            </h5>
                        </li><li class="songitem">
                            <div class="img_play">
                                <img src="Images/16.jpg" alt="NA" class="src">
                                <i class="bi playListPlay bi-play-circle-fill" id="16"></i>
                            </div>
                            <h5>On My Way <br>
                                <div class="subtitle">Alan Walker</div>
                            </h5>
                        </li><li class="songitem">
                            <div class="img_play">
                                <img src="Images/17.jpg" alt="NA" class="src">
                                <i class="bi playListPlay bi-play-circle-fill" id="17"></i>
                            </div>
                            <h5>On My Way <br>
                                <div class="subtitle">Alan Walker</div>
                            </h5>
                        </li><li class="songitem">
                            <div class="img_play">
                                <img src="Images/18.jpg" alt="NA" class="src">
                                <i class="bi playListPlay bi-play-circle-fill" id="18"></i>
                            </div>
                            <h5>On My Way <br>
                                <div class="subtitle">Alan Walker</div>
                            </h5>
                        </li><li class="songitem">
                            <div class="img_play">
                                <img src="Images/1.jpg" alt="NA" class="src">
                                <i class="bi playListPlay bi-play-circle-fill" id="19"></i>
                            </div>
                            <h5>On My Way <br>
                                <div class="subtitle">Alan Walker</div>
                            </h5>
                        </li>   
                    </div>
                </div>
                <div class="pop_artist">
                    <div class="h4">
                        <h4>Popular Artists</h4>
                        <div class="btn">
                            <i class="bi bi-arrow-left" id="pop_art_left"></i>
                            <i class="bi bi-arrow-right" id="pop_art_right"></i>
                        </div>
                    </div>
                    <div class="item">
                        <li>
                            <img src="Images/hs.jpg" alt="">
                            <h5 style="text-align: center;">Honey Singh</h5>
                        </li>
                        <li>
                            <img src="Images/2.jpg" alt="">
                            <h5 style="text-align: center;">Arijit</h5>
                        </li>
                        
                    </div>
                </div>    
            </div> 
        <div class = "master_play">
            <div class="wave" id="wave">
                <div class="wave1"></div>
                <div class="wave1"></div>
                <div class="wave1"></div>
            </div> 
            <img src="Images/BACK.jpg" alt="" id="poster_master_play">
            <h5 id = "title">
                ....
                <div class="subtitle">...</div>
            </h5>
            <div class="icon">
                <i class="bi shuffle bi-music-note-list"></i>
                <i class="bi bi-skip-start-fill" id="back"></i>
                <i class="bi bi-play-fill" id="masterPlay"></i>
                <i class="bi bi-skip-end-fill" id="next"></i>
            </div>
            <span id="current_time">0:00</span>
            <div class="bar">
                <input type="range" id="seek" min="0" max="100">
                <div class="bar2" id="bar2"></div>
                <div class="dot"></div>
            </div>
            <span id="end_time">0:60</span>
            <div class="vol">
                <i class="bi bi-volume-up" id="vol_icon"></i>
                <input type="range" id="vol" min="0" max="100">
                <div class="vol_bar" id="vol_bar"></div>
                <div class="dot" id="vol_dot"></div>
            </div>
        </div>
     </header>
   <script src="app.js"></script>
</body>
</html>