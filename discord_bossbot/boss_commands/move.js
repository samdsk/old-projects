const Discord = require("discord.js");
module.exports = {
    name: 'move',
    description: 'Move members via bot command',
    execute(bot, message, args, VARSET) {
      if(args.length == 0) return message.channel.send("Usage: +move @someone channel (channel name is case-sensitive)",{code : "css"});

      let mUser = message.guild.member(message.mentions.users.first() || message.guild.members.get(args[0]));
      if(!mUser) return message.channel.send("Couldn't find user!");

      if(!message.member.roles.get(VARSET.moveRole)) return message.channel.send("- You don't have permissions to use this command contact an Admin for more info!",{code : "diff"});
      if(mUser.hasPermission("MANAGE_MESSAGES")) return message.channel.send("- Error: No you can't MOVE him!",{code : "diff"});

      //+move @someone channel
      if(args.length == 2){
        let mVoice = args[1];
        //let mVoice = message.mentions.channels.first();
        let mV = message.guild.channels.find(channel => channel.name == mVoice);
        let reportEmbed = new Discord.RichEmbed()
        .setDescription("Reports: Member Moved")
        .setColor("#15f153")
        .addField("Moved User", mUser+" witch ID: "+mUser.id)
        .addField("Moved By", message.author+" With ID: "+ message.author.id)
        .addField("Channel", message.channel)
        .addField("To channel",mV)
        .addField("Time", message.createdAt);

        let reportsChannel = message.guild.channels.find(channel => channel.name == "reports");
        if(!reportsChannel) return message.channel.send("- Counldn't find reports channel!",{code : "diff"});

        message.delete().catch(O_o => {});
        reportsChannel.send(reportEmbed);

        if((mV == null)) return message.channel.send("- Counldn't find the channel!",{code : "diff"});

        mUser.setVoiceChannel(mV.id);

        message.channel.send(mUser+" has been moved by "+message.author);
        reportsChannel.send(reportEmbed);
        return;
      }else{
        return message.channel.send("+move @someone channel (channel name is case-sensitive)",{code : "css"});
      }

    },
};
