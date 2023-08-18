const Discord = require("discord.js");
module.exports = {
    name: 'dm-mod',
    description: 'Message Mods',
    execute(bot, message, args, VARSET) {
      if(args.length == 0) return message.channel.send("Usage: +dm-mod message (please include a subject)",{code : "css"});
      if(!message.member.hasPermission("MANAGE_MESSAGES")) return message.channel.send("-  Error: No you can't DM admins!",{code : "diff"});
      if(VARSET.modRole == undefined || VARSET.modRole == null) return message.channel.send("-  Error: You have to set Mod role first using +setup command!",{code : "diff"});

      let msg = args[0];
      let count = 0;
      let mods = message.guild.roles.get(VARSET.modRole).members.map(m=>m.user);
      mods.forEach(function(u, users){
        let uStatus = message.guild.members.get(u.id);
        let reason = args.join(" ");
        let modEmbed = new Discord.RichEmbed()
        .setDescription("MOD Direct Message")
        .setColor("#8941f4")
        .addField("Reported By", message.author+" With ID: "+ message.author.id)
        .addField("Channel", message.channel)
        .addField("Message", reason+" ")
        .addField("Time", message.createdAt)
        .setFooter("Live long and prosper ðŸ-- "+ message.guild.name, bot.user.avatarURL);

        if(uStatus.presence.status == "online" && u.id != VARSET.BOTID){
          u.send(modEmbed).catch(function(err) {
              str = "Unable to send you the list because you cannot receive DMs.";
              if(err != "DiscordAPIError: Cannot send messages to this user")
                console.log(err);
            }).then();
        }
        count++;
      });
      if(count == 0) return message.channel.send("Sorry, all our Server Moderators are Offline or Busy. Please try again later. Thanks!");
    },
};
