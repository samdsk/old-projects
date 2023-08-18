/*Admin DM System*/
const Discord = require("discord.js");

module.exports.run = function (bot, message, cmd, args, prefix){
	if(cmd === prefix+"dm-admin"){
		if(args.length === 0) return message.channel.send("Usage: +dm-admin message (please include a subject)",{code : "css"});
		if(!message.member.hasPermission("MANAGE_MESSAGES")) return message.channel.send("- Error: No you can't DM admins!",{code : "diff"});
		if(adminRole === undefined || adminRole === null) return message.channel.send("- Error: You have to set Admin role first using +setup command!",{code : "diff"});
		let msg = args[0];

		let admins = message.guild.roles.get(adminRole).members.map(m=>m.user);
		let count = 0;
		admins.forEach(function(u, users){
			let uStatus = message.guild.members.get(u.id);
			let reason = args.join(" ");
			let adminEmbed = new Discord.RichEmbed()
			.setDescription("Admin Direct Message")
			.setColor("#e8f442")
			.addField("Reported By", message.author+" With ID: "+ message.author.id)
			.addField("Channel", message.channel)
			.addField("Message", reason+" ")
			.addField("Time", message.createdAt)
			.setFooter("Live long and prosper ðŸ-- "+ message.guild.name, bot.user.avatarURL);

			if(uStatus.presence.status !== "offline" && u.id !== BOTID){

				u.send(adminEmbed).catch(function(err) {
            str = "Unable to send you the list because you cannot receive DMs.";
            if(err != "DiscordAPIError: Cannot send messages to this user")
              console.log(err);
          }).then();
				count++;
			}
		});

		if(count === 0) return message.channel.send("Sorry, all our Server Admins are Offline or Busy. Please try again later. Thanks!");
		return;
	}
}
