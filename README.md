Como utilizar o site em sua prórpia máquina:  
-Instale e inicie o XAMPP com o Apache o MySQL ativados
-Adicione o banco de dados em 127.0.0.1/phpmyadmin  
-O banco de dados está em "scheduleit/resources/scheduleit.sql"  
-A página inicial do site está em "scheduleit/view/pages/home"  
O site é dividido principalmente entre Usuários e Salas Virtuais(essas podendo ser estabelecimentos, consultórios, pequenos negócios, etc).  
Usuários podem ser funcionários em salas criadas ou podem possuir suas próprias salas, além de possuirem uma agenda que pode ser editada para bloquear certos horários e desmarcar horários marcados caso desejado.  
Para cadastrar uma sala clique na imagem do seu perfil no canto superior direito e vá em "Minhas Salas", após isso adicione uma sala no botão "+ Adicionar sala", após cadastrar a sala, ela não estará publicada para outros usuários poderem ver, é necessário voltar na página "Minas salas", para adicionar funcionários clique em "+ Adicionar funcionários" e digite o cpf do usuário cadastrado que será o funcionário, após isso selecione "Publicar" ao lado da imagem do estabelecimento, a página de pagamento é composta por "Plano", "Forma de Pagamento" e um campo para cupons(Pagamento não foi implementado). após o pagamento a sala estará visivel para todos os usuários.  
Caso esteja tendo problemas a conta "admin" de senha "123" possui uma sala criada que ainda não foi publicada  
Usuários podem acessar salas e a agenda dos funcionários cadastrados, ao realizar um agendamento o funcionário recebe uma notificação que pode ser vista ao clicar na imagem do perfil e ie em "Notificações", além de poder acessar a agenda diretamentente no botao "Agenda" ao clicar em perfil.

# View 
  Diretório onde ficam os arquivos que formam as páginas (HTML, CSS, JS)

# Model
  Diretório onde ficam os arquivos que interagem com o banco de dados (DAO)

# Controller
  Diretório onde ficam os arquivos que interagem com as páginas (POST, GET)
