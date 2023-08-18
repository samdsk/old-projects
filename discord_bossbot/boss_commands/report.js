const Discord = require("discord.js");
module.exports = {
    name: 'report',
    description: 'Report Member',
    execute(bot, message, args, VARSET) {
      if(args.length == 0) return message.channel.send("Usage: +report @someone reason",{code : "css"});

      let rUser = message.guild.member(message.mentions.users.first() || message.guild.members.get(args[0]));
      if(!rUser) return message.channel.send("- Couldn't find user!",{code : "diff"});

      if(!(args[1] == undefined)){

        let reason = args.join(" ").slice(22);
        let reportEmbed = new Discord.RichEmbed()
        .setDescription("Reports: Report")
        .setColor("#15f153")
        .addField("Reported User", rUser+" witch ID: "+rUser.id)
        .addField("Reported By", message.author+" With ID: "+ message.author.id)
        .addField("Channel", message.channel)
        .addField("Time", message.createdAt)
        .addField("Reason", reason+" ");

        let reportsChannel = message.guild.channels.find(channel => channel.name == "reports");
        if(!reportsChannel) return message.channel.send("- Counldn't find reports channel",{code : "diff"});

        message.delete(5000).catch(O_o => {});
        reportsChannel.send(reportEmbed);

        return;
      }else{
        return message.channel.send("- You must include the reason!",{code : "diff"});
      }
    },
};
