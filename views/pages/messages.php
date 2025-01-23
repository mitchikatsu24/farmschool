<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Messenger Clone</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            display: flex;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        /* Sidebar */
        .sidebar {
            width: 30%;
            max-width: 300px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 15px;
            background-color:rgb(81, 255, 0);
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .contact-list {
            flex: 1;
            overflow-y: auto;
        }

        .contact {
            display: flex;
            align-items: center;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .contact:hover {
            background-color: #f0f2f5;
        }

        .contact img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .contact .name {
            font-size: 16px;
            font-weight: bold;
        }

        /* Chat area */
        .chat-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f9f9f9;
        }

        .chat-header {
            padding: 15px;
            background-color:rgb(9, 240, 55);
            color: white;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chat-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .message {
            display: flex;
            max-width: 70%;
        }

        .message p {
            margin: 0;
            padding: 10px 15px;
            border-radius: 15px;
            font-size: 14px;
        }

        .message.sent {
            align-self: flex-end;
        }

        .message.sent p {
            background-color: #007bff;
            color: white;
            border-bottom-right-radius: 0;
        }

        .message.received {
            align-self: flex-start;
        }

        .message.received p {
            background-color: #e5e6ea;
            color: #333;
            border-bottom-left-radius: 0;
        }

        .chat-footer {
            padding: 10px;
            display: flex;
            border-top: 1px solid #ddd;
            background-color: white;
        }

        .chat-footer form input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
            font-size: 14px;
        }

        .chat-footer form button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-left: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .chat-footer form button:hover {
            background-color:rgb(10, 249, 77);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">Contacts</div>
            <div class="contact-list" id="persons">
                
            </div>
        </div>

        <!-- Chat Area -->
        <div class="chat-area">
            <div class="chat-header">
                <img src="https://via.placeholder.com/40" alt="Avatar" id="chat-avatar">
                <span id="chat-name">Select a contact</span>
            </div>
            <div class="chat-messages" id="chat-messages">
            
            
            
                <!-- Messages will appear here -->
            </div>
            <div class="chat-footer" id="chatfield" style="display: none;">
                <form action="#" style="display: flex; width:100%;" onsubmit="sendMessage()">
                <input type="text" placeholder="Type a message..." id="chat-input">
                <button type="submit">&#9658;</button>
                </form>
            </div>
        </div>
    </div>
    

    <?=jspost_script()?>
    <script>

        let uid = 0;
        function openChat(name, id) {
            document.getElementById('chat-name').textContent = name;
            getChats(id);
            uid = id;
        }

        function autoUpdate(){
            setInterval(()=>{getChats(uid)}, 5000);
        }

        async function getPersons(){
            let result = await direct_get(`/chats/getUserChats`);
            let data = result.backend.data;
            set_html("persons", "");

            data.forEach(column => {
                let fullname =  column.fullname;
                let id = column.id;
                add_html("persons", `<div class="contact" onclick="openChat('${fullname}', ${id})">
                                        <img src="https://via.placeholder.com/40" alt="John">
                                        <span class="name">${fullname}</span>
                                    </div>`)
            });
        }

        async function sendMessage() {
            const input = document.getElementById('chat-input');
            const message = input.value.trim();
    
            let result = await direct_get(`/chats/sendMessage`, {msg:message, uid:uid});
            input.value = null;
            getChats(uid);
        }

        async function getChats(id=0){
            
            if(id==0){
                set_html("chat-messages", `<div>Welcome to FarmSchool Inquiry Chat</div>`);
                get_element("chatfield").style.display = 'none';
            }else{
                get_element("chatfield").style.display = '';
                set_html("chat-messages", ``);
                let result = await direct_get(`/chats/getMessages`, {userid: id});
                let data = result.backend.data;
                
                data.forEach(column => {
                    
                    let type = column.type;
                    let msg = column.message;
                    if(type == "A"){
                        add_html("chat-messages", `<div class="message sent">
                                                        <p>${msg}</p>
                                                    </div>`);
                    }else{
                        add_html("chat-messages", `<div class="message recieve">
                                                        <p>${msg}</p>
                                                    </div>`);
                    }
                });
                chatmsg = get_element("chat-messages");
                jsscroll("#chat-messages", {top:chatmsg.scrollHeight});
            }
        }

        window_loaded(()=>{
            autoUpdate();
            getPersons();   
        });

        
    </script>
</body>
</html>
