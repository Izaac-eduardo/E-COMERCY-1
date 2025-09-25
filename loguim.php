<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce - Login/Cadastro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            min-height: 500px;
            display: flex;
            position: relative;
        }

        .form-section {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-section {
            flex: 1;
            background: linear-gradient(135deg, #ff6b6b 0%, #ff8e53 100%);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 50px;
            position: relative;
            overflow: hidden;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-100px, -100px); }
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 300;
        }

        .welcome-section p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 300;
        }

        .form-header p {
            color: #666;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }

        .toggle-link {
            text-align: center;
            color: #667eea;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .toggle-link:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .hidden {
            display: none;
        }

        .user-info {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .user-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 2.5rem;
            color: white;
            font-weight: bold;
        }

        .user-details h2 {
            color: #333;
            margin-bottom: 10px;
            font-size: 1.8rem;
        }

        .user-details p {
            color: #666;
            margin-bottom: 8px;
            font-size: 1rem;
        }

        .logout-btn {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff8e53 100%);
            margin-top: 30px;
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                margin: 20px;
                max-width: none;
            }
            
            .form-section, .welcome-section {
                padding: 30px;
            }
            
            .welcome-section {
                order: -1;
            }
        }
    </style>
</head>
<body>
    <!-- Página de Login/Cadastro -->
    <div id="authContainer" class="container">
        <div class="form-section">
            <div class="form-header">
                <h1 id="formTitle">Bem-vindo de volta!</h1>
                <p id="formSubtitle">Faça login em sua conta</p>
            </div>

            <div id="alertContainer"></div>

            <!-- Formulário de Login -->
            <form id="loginForm">
                <div class="form-group">
                    <label for="loginEmail">E-mail</label>
                    <input type="email" id="loginEmail" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Senha</label>
                    <input type="password" id="loginPassword" required>
                </div>
                <button type="submit" class="btn">Entrar</button>
            </form>

            <!-- Formulário de Cadastro -->
            <form id="registerForm" class="hidden">
                <div class="form-group">
                    <label for="registerName">Nome Completo</label>
                    <input type="text" id="registerName" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">E-mail</label>
                    <input type="email" id="registerEmail" required>
                </div>
                <div class="form-group">
                    <label for="registerPhone">Telefone</label>
                    <input type="tel" id="registerPhone" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Senha</label>
                    <input type="password" id="registerPassword" required>
                </div>
                <div class="form-group">
                    <label for="registerConfirmPassword">Confirmar Senha</label>
                    <input type="password" id="registerConfirmPassword" required>
                </div>
                <button type="submit" class="btn">Cadastrar</button>
            </form>

            <a href="#" class="toggle-link" id="toggleForm">Não tem conta? Cadastre-se aqui</a>
        </div>

        <div class="welcome-section">
            <div class="welcome-content">
                <h2>Sua Loja Online</h2>
                <p>Descubra produtos incríveis e tenha a melhor experiência de compra online. Junte-se à nossa comunidade!</p>
            </div>
        </div>
    </div>

    <!-- Página do Usuário Logado -->
    <div id="userContainer" class="user-info hidden">
        <div class="user-avatar" id="userAvatar">U</div>
        <div class="user-details">
            <h2 id="userName">Nome do Usuário</h2>
            <p><strong>E-mail:</strong> <span id="userEmail">email@exemplo.com</span></p>
            <p><strong>Telefone:</strong> <span id="userPhone">+55 (11) 99999-9999</span></p>
            <p><strong>Data de cadastro:</strong> <span id="userDate">01/01/2024</span></p>
        </div>
        <button class="btn logout-btn" id="logoutBtn">Sair da Conta</button>
    </div>

    <script>
        // Simulação de banco de dados em memória
        let users = [
            {
                id: 1,
                name: "João Silva",
                email: "joao@exemplo.com",
                phone: "+55 (11) 99999-1234",
                password: "123456",
                registeredAt: "2024-01-15"
            },
            {
                id: 2,
                name: "Maria Santos",
                email: "maria@exemplo.com",
                phone: "+55 (11) 99999-5678",
                password: "senha123",
                registeredAt: "2024-02-10"
            }
        ];

        let currentUser = null;
        let isLoginMode = true;

        // Elementos DOM
        const authContainer = document.getElementById('authContainer');
        const userContainer = document.getElementById('userContainer');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const toggleForm = document.getElementById('toggleForm');
        const formTitle = document.getElementById('formTitle');
        const formSubtitle = document.getElementById('formSubtitle');
        const alertContainer = document.getElementById('alertContainer');

        // Elementos do usuário logado
        const userAvatar = document.getElementById('userAvatar');
        const userName = document.getElementById('userName');
        const userEmail = document.getElementById('userEmail');
        const userPhone = document.getElementById('userPhone');
        const userDate = document.getElementById('userDate');
        const logoutBtn = document.getElementById('logoutBtn');

        // Função para mostrar alertas
        function showAlert(message, type = 'error') {
            alertContainer.innerHTML = `
                <div class="alert alert-${type}">
                    ${message}
                </div>
            `;
            setTimeout(() => {
                alertContainer.innerHTML = '';
            }, 5000);
        }

        // Alternar entre login e cadastro
        toggleForm.addEventListener('click', (e) => {
            e.preventDefault();
            isLoginMode = !isLoginMode;
            
            if (isLoginMode) {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                formTitle.textContent = 'Bem-vindo de volta!';
                formSubtitle.textContent = 'Faça login em sua conta';
                toggleForm.textContent = 'Não tem conta? Cadastre-se aqui';
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                formTitle.textContent = 'Criar Conta';
                formSubtitle.textContent = 'Cadastre-se para começar';
                toggleForm.textContent = 'Já tem conta? Faça login aqui';
            }
            alertContainer.innerHTML = '';
        });

        // Função para fazer login
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            
            const user = users.find(u => u.email === email && u.password === password);
            
            if (user) {
                currentUser = user;
                showUserProfile();
                showAlert('Login realizado com sucesso!', 'success');
            } else {
                showAlert('E-mail ou senha incorretos!');
            }
        });

        // Função para cadastrar usuário
        registerForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const name = document.getElementById('registerName').value;
            const email = document.getElementById('registerEmail').value;
            const phone = document.getElementById('registerPhone').value;
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('registerConfirmPassword').value;
            
            // Validações
            if (password !== confirmPassword) {
                showAlert('As senhas não coincidem!');
                return;
            }
            
            if (users.find(u => u.email === email)) {
                showAlert('E-mail já cadastrado!');
                return;
            }
            
            if (password.length < 6) {
                showAlert('A senha deve ter pelo menos 6 caracteres!');
                return;
            }
            
            // Criar novo usuário
            const newUser = {
                id: users.length + 1,
                name: name,
                email: email,
                phone: phone,
                password: password,
                registeredAt: new Date().toISOString().split('T')[0]
            };
            
            users.push(newUser);
            currentUser = newUser;
            
            showUserProfile();
            showAlert('Cadastro realizado com sucesso!', 'success');
        });

        // Função para mostrar perfil do usuário
        function showUserProfile() {
            authContainer.classList.add('hidden');
            userContainer.classList.remove('hidden');
            
            userAvatar.textContent = currentUser.name.charAt(0).toUpperCase();
            userName.textContent = currentUser.name;
            userEmail.textContent = currentUser.email;
            userPhone.textContent = currentUser.phone;
            userDate.textContent = formatDate(currentUser.registeredAt);
        }

        // Função para fazer logout
        logoutBtn.addEventListener('click', () => {
            currentUser = null;
            authContainer.classList.remove('hidden');
            userContainer.classList.add('hidden');
            
            // Limpar formulários
            loginForm.reset();
            registerForm.reset();
            alertContainer.innerHTML = '';
        });

        // Função para formatar data
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('pt-BR');
        }

        // Função para mostrar usuários cadastrados (para demonstração)
        function showRegisteredUsers() {
            console.log('Usuários cadastrados:', users);
        }

        // Log inicial dos usuários para demonstração
        console.log('Sistema inicializado com os seguintes usuários:');
        console.log('E-mail: joao@exemplo.com | Senha: 123456');
        console.log('E-mail: maria@exemplo.com | Senha: senha123');

        // Dentro do login
if (user) {
    currentUser = user;
    localStorage.setItem("loggedUser", JSON.stringify(user)); // 🔹 salva no navegador
    window.location.href = "index.php"; // 🔹 redireciona para a página principal
}

// Dentro do cadastro
users.push(newUser);
currentUser = newUser;
localStorage.setItem("loggedUser", JSON.stringify(newUser)); // 🔹 salva no navegador
window.location.href = "index.php"; // 🔹 redireciona
    
    </script>
</body>
</html>