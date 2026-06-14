<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Filmera Key</title>    
        <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    </head>
    <body>
        <nav class="navbar">
            <a href="landing.blade.php" class="logo">
                <img src="{{ asset('assets/picture/logo_filmera.png') }}" alt="Logo">
                FILMERAKEY
            </a>
            <div class="menu">
                <a href="{{route('login')}}" class="btn-login">Login</a>
            </div>
        </nav>
        <header class="hero-section">
            <div class="hero-content">
                <h1><span>Welcome to</span><br><strong>FilmeraKey</strong></h1>
                <h2>Your Gateway to the world of Movie-Powered by API</h2>
                <p>
                    Get your personal API key today and access our curated movie database, perfect for learning, building, or experimenting.
                </p>
                <a href="{{route('register')}}" class="btn-register">Register Now!</a>
            </div>
            <div class="hero-image">
                <img src="{{ asset('assets/picture/pic_landing_1.png') }}" alt="Cinema Scene" />
            </div>
        </header>

        <main>
            <section class="how-it-works" aria-labelledby="how-it-works-heading">
                <h2>⚙️ How it Works?</h2>
                <ol class="steps">
                    <li class="step">1. Create an account</li>
                    <li class="step">2. Log in to get your personal API key</li>
                    <li class="step">3. Use your key to call our API endpoints</li>
                    <li class="step">4. See the response in Postman, browser, or your app</li>
                </ol>
            </section>
            <section class="sample-api-response" aria-labelledby="sample-api-reponses-heading"> <br>
                <h2>📦 Sample API Responses</h2>
                <div class="layout-sample-api">
                    <div class="sample_api">
                        <img src="{{ asset('assets/picture/sample_api_wht.png') }}" alt="sample-api-1">
                    </div>
                    <div class="function-sample">
                        <p>FilmeraKey is your personal gateway to unlocking the full power of the Filmera API! With just a single click, you can generate a unique API key that lets you securely access, manage, and interact with movie data in real time. Whether you're building apps, running searches, or performing updates, your API key ensures a seamless and personalized experience. Ready to take control? Generate your key and dive into the world of Filmera today!</p>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <header class="header">
                        <h1>🎬 Film API Documentation</h1>
                        <p class="subtitle">A comprehensive guide to our film database API</p>
                    </header>

                    <div class="api-section">
                        <!-- informasi API required   -->
                        <div class="endpoint-card">
                            <div class="endpoint-header">
                                <span class="method get">API</span>
                                <h2>Required API</h2>
                            </div>
                            <p class="description">Retrieve API Key from FilmeraKey</p>
                            <div class="code-block headers show">
                                <pre><code class="language-http">Authorization: Bearer {X_API_KEY}</code></pre>
                            </div>
                        </div>

                        <div class="endpoint-card">
                            <div class="endpoint-header">
                                <span class="method get">GET ALL</span>
                                <h2>/api/films</h2>
                            </div>
                            <p class="description">Retrieve all films from the database</p>
                            
                            <div class="code-tabs">
                                <div class="tab active" data-tab="response">Response</div>
                            </div>
                            
                            <div class="code-block response show">
                                <pre><code class="language-json">
    [
        {
            "id": 1,
            "title": "Inception",
            "genre": "Sci-Fi",
            "director": "Christopher Nolan",
            "release_year": "2010",
            "synopsis": "A thief who steals corporate secrets...",
            "poster_url": "https://example.com/inception.jpg"
                                        
        },
        {
            "id": 2,
            "title": "Interstellar",
            "genre": "Sci-Fi",
            "director": "Christopher Nolan",
            "release_year": "2014",
            "synopsis": "A team of explorers travel through a wormhole...",
            "poster_url": "https://example.com/interstellar.jpg"
        }
    ]</code></pre>                           
                            </div>
                        </div>

                        <div class="endpoint-card">
                            <div class="endpoint-header">
                                <span class="method get">GET by ID</span>
                                <h2>/api/films/{id}</h2>
                            </div>
                            <p class="description">Retrieve details of a specific film by ID</p>
                            
                            <div class="example">
                                <h4>Example Request</h4>
                                <div class="example-url">
                                    <code>GET /api/films/1</code>
                                </div>
                            </div>
                        </div>

                        <div class="endpoint-card">
                            <div class="endpoint-header">
                                <span class="method get">GET</span>
                                <h2>/api/films/search</h2>
                            </div>
                            <p class="description">Search films by title</p>
                            
                            <div class="parameters">
                                <h4>Query Parameters</h4>
                                <table>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                    <tr>
                                        <td>query</td>
                                        <td>string</td>
                                        <td>Search term to match against film titles</td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div class="example">
                                <h4>Example Request</h4>
                                <div class="example-url">
                                    <code>GET /api/films/search?query=Dark</code>
                                </div>
                            </div>
                        </div>

                        <div class="endpoint-card">
                            <div class="endpoint-header">
                                <span class="method post">POST</span>
                                <h2>/api/films</h2>
                            </div>
                            <p class="description">Add a new film to the database (API key required)</p>
                            
                            <div class="code-tabs">
                                <div class="tab active" data-tab="headers">Headers</div>
                                <div class="tab" data-tab="request">Request Body</div>
                            </div>
                            
                            <div class="code-block headers show">
                                <pre><code class="language-http">Authorization: Bearer {X_API_KEY}
Content-Type: application/json</code></pre>
                            </div>
                            
                            <div class="code-block request">
                                <pre><code class="language-json">{
    "title": "Interstellar",
    "genre": "Sci-Fi",
    "director": "Christopher Nolan",
    "release_year": "2014",
    "synopsis": "A team of explorers travel through a wormhole...",
    "poster_url": "https://example.com/interstellar.jpg"
}</code></pre>
                            </div>
                        </div>

                        <div class="endpoint-card">
                            <div class="endpoint-header">
                                <span class="method put">PUT</span>
                                <h2>/api/films/{id}</h2>
                            </div>
                            <p class="description">Update an existing film (API key required)</p>
                            
                            <div class="code-tabs">
                                <div class="tab active" data-tab="headers">Headers</div>
                                <div class="tab" data-tab="request">Request Body</div>
                            </div>
                            
                            <div class="code-block headers show">
                                <pre><code class="language-http">Authorization: Bearer {X_API_KEY}
Content-Type: application/json</code></pre>
                            </div>
                            
                            <div class="code-block request">
                                <pre><code class="language-json">{
    "title": "Inception 1",
    "genre": "Sci-Fi",
    "director": "Christopher Nolan",
    "release_year": "2010",
    "synopsis": "A thief who steals corporate secrets through dream-sharing technology is given a task to plant an idea into a target's mind.",
    "poster_url": "https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_.jpg"
}</code></pre>
                            </div>
                        </div>

                        <div class="endpoint-card">
                            <div class="endpoint-header">
                                <span class="method delete">DELETE</span>
                                <h2>/api/films/{id}</h2>
                            </div>
                            <p class="description">Delete a film from the database (API key required)</p>
                            
                            <div class="code-tabs">
                                <div class="tab active" data-tab="headers">Headers</div>
                            </div>
                            
                            <div class="code-block headers show">
                                <pre><code class="language-http">Authorization: Bearer {X_API_KEY}</code></pre>
                            </div>
                            
                            <div class="example">
                                <h4>Example Request</h4>
                                <div class="example-url">
                                    <code>DELETE /api/films/1</code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Simple tab switching functionality
                    document.querySelectorAll('.tab').forEach(tab => {
                        tab.addEventListener('click', () => {
                            const tabName = tab.getAttribute('data-tab');
                            const parentCard = tab.closest('.endpoint-card');
                            
                            // Hide all code blocks in this card
                            parentCard.querySelectorAll('.code-block').forEach(block => {
                                block.classList.remove('show');
                            });
                            
                            // Show selected code block
                            parentCard.querySelector(`.code-block.${tabName}`).classList.add('show');
                            
                            // Update active tab
                            parentCard.querySelectorAll('.tab').forEach(t => {
                                t.classList.remove('active');
                            });
                            tab.classList.add('active');
                        });
                    });
                </script>
            </section>
            
        </main>
        <footer class="site-footer">
            <div class="footer-content">
                <p class="copyright">&copy; 2025 FilmeraKey — Your Simple Gateway to Movie Data.</p>
            </div>
        </footer>
    </body>
</html>