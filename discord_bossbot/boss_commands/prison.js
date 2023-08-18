const Discord = require("discord.js");
module.exports = {
    name: 'prison',
    description: 'Send member to prison',
    execute(bot, message, args, VARSET) {
      if(args.length === 0){
  			message.channel.send("Usage send to prison: +prison @someone time[s] (number!)",{code : "bs"});
  			message.channel.send("Usage release all: +prison release (prisoners will be released to default voice channel!)",{code : "bs"});
  			message.channel.send("Usage break: +prison break @someone (mentioned user will be released from prison and moved to default channel)",{code : "bs"});
  			message.channel.send("Abuse: If someone abuse prison command without any reason please report the user to the server admin",{code : "bs"});
  			return;
  		}
  		if(!message.member.hasPermission("KICK_MEMBERS")) return message.channel.send("- Error: No you can't!",{code : "diff"});

  		let prison = message.guild.channels.find(channel => channel.name == "Prison");
  		let prisonRole = message.guild.roles.find(role => role.name == "Prison");

  		if(!prisonRole) return message.channel.send("- Server doesn't have a prison role",{code : "diff"});
  		let defaultVoice = message.guild.channels.find(channel => channel.name == "Released");
  		let cMembers = prison.members;

  		if(args[0] == "release"){
  			cMembers.forEach(function(u,users){

  				u.removeRole(prisonRole.id).then(console.log(`Removed Prison`)).catch(console.error);
  				u.addRole(VARSET.moveRole).then(console.log(`Added Access to All Channels`)).catch(console.error);
  				u.setVoiceChannel(defaultVoice.id).then(console.log(`Moved from Prison to Default channel`)).catch(console.error);

  				if(u.serverMute || u.serverDeaf){
  					u.setMute(false).then(() => console.log(`Unmuted`)).catch(console.error); u.setDeaf(false).then(() => console.log(`Undeafed`)).catch(console.error);
  				}
  			});
  			return;
  		}

  		if(args[0] === "break"){
  			if(args.length == 1) return message.channel.send("Usage: +prison break @someone",{code : "css"});
  			let toBreak = message.guild.member(message.mentions.users.first() || message.guild.members.get(args[0]));
  			if(!toBreak) return message.channel.send("- Couldn't find user!",{code : "diff"});
  			cMembers.forEach(function(u,users){
  				if(toBreak == u){
  					toBreak.removeRole(prisonRole.id).then(console.log(`Removed Prison`)).catch(console.error);

  					toBreak.addRole(VARSET.moveRole).then(console.log(`Added Access to All Channels`)).catch(console.error);

  					toBreak.setVoiceChannel(defaultVoice.id).then(console.log(`Moved from Prison to Default channel`)).catch(console.error);

  						if(toBreak.serverMute || toBreak.serverDeaf){
  							toBreak.setMute(false).then(() => console.log(`Unmuted`)).catch(console.error); toBreak.setDeaf(false).then(() => console.log(`Undeafed`)).catch(console.error);
  						}

  					return message.channel.send(`- User ${toBreak.user.username} has been broken out of the prison!`,{code : "diff"});
  				}else if(!toBreak){	return message.channel.send("-  Couldn't find user in prison!",{code : "diff"});}
  			});

  			return;
  		}

  		let kUser = message.guild.member(message.mentions.users.first() || message.guild.members.get(args[0]));
  		if(!kUser) return message.channel.send("- Couldn't find user!",{code : "diff"});

  		if(kUser.hasPermission("MANAGE_MESSAGES")) return message.channel.send("- Error: No you can't MOVE him!",{code : "diff"});


  		let kTime = args[1];
  		if(isNaN(kTime)) return message.channel.send("- Time must be a number!",{code : "diff"});

  		if(!(args[1] == undefined) && !(args[0]=="break") && !(args[0]=="release")){

  			let kUserVoice = kUser.voiceChannelID;
  			if(kUserVoice == prison.id){return message.channel.send(`- User ${kUser.user.username} has already been jailed!`,{code : "diff"});}
  			//let reason = args.join(" ").slice(22);
  			let reportEmbed = new Discord.RichEmbed()
  			.setDescription("Reports: Prisoned")
  			.setColor("#15f153")
  			.addField("Jailed User", kUser+" witch ID: "+kUser.id)
  			.addField("Jailed By", message.author+" With ID: "+ message.author.id)
  			.addField("Channel", message.channel)
  			.addField("Time", message.createdAt)
  			.addField("Prison Time", "Has been jailed for "+kTime+"seconds.");


  			let reportsChannel = message.guild.channels.find(channel => channel.name == "reports");
  			if(!reportsChannel) return message.channel.send("- Counldn't find reports channel",{code : "diff"});

  			//message.delete().catch(O_o => {});
  			reportsChannel.send(reportEmbed);
        console.log(prison.id)
  			kUser.setVoiceChannel(prison.id).then(console.log(`Moved to Prison`)).catch(console.error);

  			kUser.addRole(prisonRole.id).then(console.log(`Added Prison Role`)).catch(console.error);
  			kUser.removeRole(VARSET.moveRole).then(console.log(`Removed Access to All Channels`)).catch(console.error);

  			message.channel.send(kUser+" has been jailed for "+kTime+"seconds.");

  			setTimeout(function(){
  				kUser.removeRole(prisonRole.id).then(console.log(`Removed Prison`)).catch(console.error);
  				kUser.addRole(VARSET.moveRole).then(console.log(`Added Access to All Channels`)).catch(console.error);
  				kUser.setVoiceChannel(kUserVoice).then(console.log(`Moved from Prison to his old channel`)).catch(console.error);
  				if(kUser.serverMute || kUser.serverDeaf){
  					kUser.setMute(false).then(() => console.log(`Unmuted`)).catch(console.error); kUser.setDeaf(false).then(() => console.log(`Undeafed`)).catch(console.error);
  				}
  				message.channel.send(kUser + " has been released from prison!");

  			},1000*(kTime));

  			return;
  		}else{
  			return message.channel.send("You must set the time[s]!");
  		}

    },
};
