module.exports = {
    name: 'nickname',
    description: 'Change Nickname',
    execute(bot, message, args, VARSET) {
      if(args.length == 0) return message.channel.send("Usage: +nickname [nickname]",{code : "css"});
  		if(!message.member.hasPermission("MANAGE_MESSAGES")) return message.channel.send("-  Error: No you can't change your nickname!",{code : "diff"});

  		let nick = args[0];
  		let oldNick = message.member.nickname;

  		if(!message.member.nickname){
  			oldNick = message.member.username;
  		}

  		message.member.setNickname(nick).then(() => console.log(`error set-nick`)).catch(console.error);;
  		message.channel.send("The user known as "+oldNick+" has changed nickname to "+nick);
  		return;
    },
};
